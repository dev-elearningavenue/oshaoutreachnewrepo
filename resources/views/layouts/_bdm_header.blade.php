@if(config('app.env') == 'production')
    @php
        $gtag_ID = '';
    @endphp
    @if($WEB_CREDIT == 1)
        @php
            $gtag_ID = 'UA-73532257-10';
            $jivoWidgetID = 'lD5H1YS4Om';
        @endphp
    @elseif($WEB_CREDIT == 2)
        @php
            $gtag_ID = 'UA-73532257-11';
            $jivoWidgetID = 'yZ7XwwPotx';
        @endphp
    @elseif($WEB_CREDIT == 3)
        @php
            $gtag_ID = 'UA-73532257-12';
            $jivoWidgetID = 'lD5H1YS4Om';
        @endphp
    @endif

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $gtag_ID }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', '{{ $gtag_ID }}');

        @if(Route::currentRouteName() == 'success' && $order->is_gtag_submitted != true)

            @php
                $order_amount = 0;
                if(!empty($order->discount)){
                    $order_amount = $order->discounted_price;
                }else{
                    $order_amount = $cart->totalPrice;
                }
            @endphp

            var order_amount = parseFloat('{{ $order_amount }}');
            var order_uid = '{{ $order->uoid }}';

            @php
                $total_products = 0;
            @endphp

            gtag('event', 'purchase', {
                "transaction_id": order_uid,
                "affiliation": "OSHA Outreach Courses",
                'value': order_amount,
                "currency": "USD",
                "tax": 0,
                "shipping": 0,
                "items": [
                        @foreach($cart->items as $key => $product)
                    {
                        "id": 'SKU-{{ str_pad($product['item']['id'], 4, '0', STR_PAD_LEFT) }}',
                        "name": '{{ $product['item']['title'] }}',
                        "brand": "OSHA",
                        "category": "Online Courses",
                        "quantity": '{{ $product['qty'] }}',
                        "price": '{{ $product['item']['price'] }}'
                    },
                    @php
                        $total_products = $total_products + $product['qty'] ;
                    @endphp
                    @endforeach
                ]
            });
        </script>
        <script type='text/javascript'>
            @php
                $order->is_gtag_submitted = true;
                $order->save();
            @endphp
        @endif
    </script>
    <!-- BEGIN JIVOSITE CODE {literal} -->
    <script type='text/javascript' defer>
        (function () {
            var widget_id = "{{ $jivoWidgetID }}";
            var s = document.createElement('script');
            s.type = 'text/javascript';
            s.async = true;
            s.src = '//code.jivosite.com/script/widget/' + widget_id;
            var ss = document.getElementsByTagName('script')[0];
            ss.parentNode.insertBefore(s, ss);
        })();
    </script>
<!-- {/literal} END JIVOSITE CODE -->
@endif
