<?php

namespace App\Http\Traits;

use FacebookAds\Api;
use FacebookAds\Object\ServerSide\Content;
use FacebookAds\Object\ServerSide\CustomData;
use FacebookAds\Logger\CurlLogger;
use FacebookAds\Object\ServerSide\Event as ConversionEvent;
use FacebookAds\Object\ServerSide\EventRequest as ConversionEventRequest;
use FacebookAds\Object\ServerSide\UserData;
use FacebookAds\Object\ServerSide\EventRequestAsync as ConversionEventRequestAsync;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

trait ConversionApiTrait
{
    protected $conversionEventsArr = array();

    protected function create_conversion_event(array $userData, $price, $eventName, $customData, $contentName = 'thankyou', $contentType = 'product')
    {
        $user_data = (new UserData())
            ->setClientIpAddress($userData['ip'])
            ->setClientUserAgent($userData['userAgent'])
            ->setEmail($userData['email'] ?? '')
            ->setPhone($userData['phone'] ?? '')
            ->setFirstName($userData['firstname'] ?? '')
            ->setLastName($userData['lastname'] ?? '')
            ->setCity($userData['city'] ?? '')
            ->setState($userData['state'] ?? '')
            ->setCountryCode($userData['countryCode'] ?? '');

        $custom_data = (new CustomData())
            ->setCurrency('USD')
            ->setValue($price);

        if($contentType == 'Course') {
            $product_sku = ["SKU-".str_pad($customData['course_id'], 4, '0', STR_PAD_LEFT)];

            $custom_data
                ->setContentName($contentName)
                ->setContentType($contentType)
                ->setContentIds($product_sku);
        }

        if (!empty($customData->items)) {
            $contents = [];
            $content_ids = [];

            $customDataProductKeys = array_keys($customData->items);
            foreach ($customDataProductKeys as $customDataProductKey) {
                $content_ids[] = str_pad($customDataProductKey, 4, '0', STR_PAD_LEFT);
            }

            // Set contents
            foreach ($customData->items as $key => $item) {
                $contentItem = (new Content())
                    ->setProductId(str_pad($item['item']['id'], 4, '0', STR_PAD_LEFT))
                    ->setQuantity($item['qty'])
                    ->setTitle($item['item']['title'])
                    ->setItemPrice($item['item']['discounted_price'] > 0 ? $item['item']['discounted_price'] : $item['item']['price'])
                    ->setBrand('OSHA Outreach Courses')
                    ->setCategory('Online Courses');

                $contents[] = $contentItem;
            }

            $custom_data
                ->setContentName($contentName)
                ->setContentType($contentType)
                ->setContentIds($content_ids)
                ->setContents($contents);

        } else if(isset($customData['items'])) {
            //this condition is for group cart which is slightly different :(
            $contents = [];
            $content_ids = [];

            // Set contents
            foreach ($customData['items'] as $key => $item) {
                $contentItem = (new Content())
                    ->setProductId(str_pad($item['id'], 4, '0', STR_PAD_LEFT))
                    ->setQuantity($item['quantity'])
                    ->setTitle($item['title'])
                    ->setItemPrice($item['price'])
                    ->setBrand('OSHA Outreach Courses')
                    ->setCategory('Online Courses');


                $content_ids[] = str_pad($item['id'], 4, '0', STR_PAD_LEFT);
                $contents[] = $contentItem;
            }

            $custom_data
                ->setContentName($contentName)
                ->setContentType($contentType)
                ->setContentIds($content_ids)
                ->setContents($contents);
        }

        if(strpos($contentName, 'purchase') !== false) {
            $custom_data->setOrderId($userData['order_id']);
        }

         $conversionEvent = (new ConversionEvent())
            ->setEventName($eventName)
            ->setEventTime(time())
            ->setEventSourceUrl($userData['eventSourceURL'])
            ->setUserData($user_data)
            ->setCustomData($custom_data);

        if(isset($userData['event_id'])) {
            $conversionEvent->setEventId($userData['event_id']);
        }

        return $conversionEvent;
    }

    protected function executeConversionEvents()
    {
        Api::init(null, null, env('FB_ACCESS_TOKEN'), false);
        $api = Api::instance();
        $api->setLogger(new CurlLogger());

        $request = (new ConversionEventRequest(env('FB_PIXEL_ID')))
            ->setEvents($this->conversionEventsArr);

        $request->execute();
    }

    protected function executeConversionEventsAsync()
    {
        Api::init(null, null, env('FB_ACCESS_TOKEN'), false);
        $api = Api::instance();
        $api->setLogger(new CurlLogger());

        $async_request = (new ConversionEventRequestAsync(env('FB_PIXEL_ID')))
            ->setEvents($this->conversionEventsArr);

        return $async_request->execute()
            ->then(
                function () {
                    Log::info(
                        "executeConversionEventsAsync ran fine\n"
                    );
                },
                function (RequestException $e) {
                    Log::error(
                        "Error!!!\n" .
                        $e->getMessage() . "\n" .
                        $e->getRequest()->getMethod() . "\n" .
                        time()
                    );
                }
            );
    }
}
