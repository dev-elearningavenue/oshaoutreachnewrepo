<?php

namespace App\Http\Traits;

trait SMSTrait{

    protected function sendSMS($msg_body, $to_mobile_no){
        if(empty($msg_body) || empty($to_mobile_no)){
            return false;
        }

        // Configure HTTP basic authorization: BasicAuth
        $config = \ClickSend\Configuration::getDefaultConfiguration()
            ->setUsername('farhan@oshaoutreachcourses.com')
            ->setPassword('34FE7466-40EA-3F05-54BB-E7633A0D8642');
        $apiInstance = new \ClickSend\Api\SMSApi(new \GuzzleHttp\Client(),
            $config);
        $msg         = new \ClickSend\Model\SmsMessage();

        $msg->setFrom('+18338894042');
        $msg->setBody($msg_body);
        $msg->setTo($to_mobile_no);
        $msg->setSource("sdk");

        // \ClickSend\Model\SmsMessageCollection | SmsMessageCollection model
        $sms_messages = new \ClickSend\Model\SmsMessageCollection();
        $sms_messages->setMessages([$msg]);
        try {
            $result = $apiInstance->smsSendPost($sms_messages);
//            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling SMSApi->smsSendPost: ', $e->getMessage(), PHP_EOL;
        }

    }
}
