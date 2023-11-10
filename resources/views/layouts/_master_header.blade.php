@if(config('app.env') == 'production')
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-M2QZGDM');</script>
    <!-- End Google Tag Manager -->

    <!-- Mailchimp Ads Target Script -->
    <script id="mcjs">!function (c, h, i, m, p) {
            m = c.createElement(h), p = c.getElementsByTagName(h)[0], m.async = 1, m.src = i, p.parentNode.insertBefore(m, p)
        }(document, "script", "https://chimpstatic.com/mcjs-connected/js/users/af733f387592fef9ee043dfcb/5951058b9217caef84fe4b2b3.js");</script>
    <!-- End Mailchimp Ads Target Script -->

    <!--BEGIN: Microsoft Advertising UET Javascript tag.-->
    <script>(function (w, d, t, r, u) {
            var f, n, i;
            w[u] = w[u] || [], f = function () {
                var o = {ti: "20128794"};
                o.q = w[u], w[u] = new UET(o), w[u].push("pageLoad")
            }, n = d.createElement(t), n.src = r, n.async = 1, n.onload = n.onreadystatechange = function () {
                var s = this.readyState;
                s && s !== "loaded" && s !== "complete" || (f(), n.onload = n.onreadystatechange = null)
            }, i = d.getElementsByTagName(t)[0], i.parentNode.insertBefore(n, i)
        })(window, document, "script", "//bat.bing.com/bat.js", "uetq");</script>
    <!--END: Microsoft Advertising UET Javascript tag-->

    <meta name="google-site-verification" content="R3O-GwQBBR_mmIIKNIx47u8Z5HIBEb9dZ6-sYmbPwZU"/>
    <meta name="google-site-verification" content="EVVoH-BPn04dS-rAkJll_DWNtqgbylRahB-KU5HXhZU"/>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-374122451"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'G-374122451');
        gtag('config', 'AW-945079766');

        gtag('config', 'AW-945079766/UzXgCJux7MgBENaL08ID', {
            'phone_conversion_number': '+1-833-212-6742'
        });
    </script>
    {{--        @if((Route::currentRouteName() == 'success' && $order->is_gtag_submitted != true ) ||--}}
    {{--                (Route::currentRouteName() == 'group-enrollment.success' && $group_order->is_gtag_submitted != true ))--}}

    {{--            @php--}}
    {{--                $order_amount = 0;--}}
    {{--                if(isset($order)){--}}
    {{--                    if(!empty($order->discount)){--}}
    {{--                        $order_amount = $order->discounted_price;--}}
    {{--                    }else{--}}
    {{--                       $order_amount = $cart->totalPrice - $cart->discount;--}}
    {{--                    }--}}
    {{--                } else {--}}
    {{--                    $order_amount = $group_order->amount;--}}
    {{--                }--}}
    {{--            @endphp--}}

    {{--            var order_amount = parseFloat('{{ $order_amount }}');--}}
    {{--            var order_uid = '{{ isset($order) ? $order->uoid : $group_order->guoid }}';--}}
    {{--            var order_email = '{{ isset($order) ? $order->email : $group_order->email }}';--}}

    {{--            @php--}}
    {{--                $total_products = 0;--}}
    {{--            @endphp--}}

    {{--            function GetRevenueValue() {--}}
    {{--                return order_amount;--}}
    {{--            }--}}

    {{--            var bingTimer = setInterval(function () {--}}
    {{--            if (window.uetq) {--}}
    {{--                // <!-- Bing Track Variable Revenue -->--}}
    {{--                window.uetq = window.uetq || [];--}}
    {{--                // window.uetq.push('event', 'Purchase', {'revenue_value': GetRevenueValue(), 'currency': 'USD'});--}}
    {{--                window.uetq.push('event', '', {'revenue_value': GetRevenueValue(), 'currency': 'USD'});--}}

    {{--                clearInterval(bingTimer);--}}
    {{--            }--}}
    {{--        }, 100);--}}

    {{--            // <!-- Event snippet for Purchase - Adwords conversion page -->--}}
    {{--            // Use different Conversion for sales from GroupEnrollment Page--}}
    {{--            @if(in_array("group-enrollment", explode("/", url()->previous())))--}}
    {{--            gtag('event', 'conversion', {--}}
    {{--                'send_to': 'AW-945079766/P0x0COuPvs4DENaL08ID',--}}
    {{--                'value': order_amount,--}}
    {{--                'currency': 'USD',--}}
    {{--                'transaction_id': order_uid--}}
    {{--            });--}}
    {{--            @else--}}
    {{--            gtag('event', 'conversion', {--}}
    {{--                'send_to': 'AW-945079766/Yq-QCKmk7MgBENaL08ID',--}}
    {{--                'value': order_amount,--}}
    {{--                'currency': 'USD',--}}
    {{--                'transaction_id': order_uid--}}
    {{--            });--}}
    {{--            @endif--}}

    {{--            gtag('event', 'purchase', {--}}
    {{--            "transaction_id": order_uid,--}}
    {{--            "affiliation": "OSHA Outreach Courses",--}}
    {{--            'value': order_amount,--}}
    {{--            "currency": "USD",--}}
    {{--            "tax": 0,--}}
    {{--            "shipping": 0,--}}
    {{--            "items": [--}}
    {{--                    @if(isset($order))--}}
    {{--                    @foreach($cart->items as $key => $product)--}}
    {{--                {--}}
    {{--                    "id": 'SKU-{{ str_pad($product['item']['id'], 4, '0', STR_PAD_LEFT) }}',--}}
    {{--                    "name": '{{ $product['item']['title'] }}',--}}
    {{--                    "brand": "OSHA Outreach Courses",--}}
    {{--                    "category": "Online Courses",--}}
    {{--                    "quantity": '{{ $product['qty'] }}',--}}
    {{--                    "price": '{{ $product['item']['discounted_price'] == 0 ? $product['item']['price'] : $product['item']['discounted_price'] }}'--}}
    {{--                },--}}
    {{--                    @php--}}
    {{--                        $total_products = $total_products + $product['qty'] ;--}}
    {{--                    @endphp--}}
    {{--                    @endforeach--}}
    {{--                    @else--}}
    {{--                    @foreach($cart['items'] as $key => $product)--}}
    {{--                {--}}
    {{--                    "id": 'SKU-{{ str_pad($product['id'], 4, '0', STR_PAD_LEFT) }}',--}}
    {{--                    "name": '{{ $product['title'] }}',--}}
    {{--                    "brand": "OSHA Outreach Courses",--}}
    {{--                    "category": "Online Courses",--}}
    {{--                    "quantity": '{{ $product['quantity'] }}',--}}
    {{--                    "price": '{{ $product['price'] }}'--}}
    {{--                },--}}
    {{--                @php--}}
    {{--                    $total_products = $total_products + $product['quantity'] ;--}}
    {{--                @endphp--}}
    {{--                @endforeach--}}
    {{--                @endif--}}
    {{--            ]--}}
    {{--        });--}}

    {{--            var twitterTimer = setInterval(function () {--}}
    {{--            if (window.twq) {--}}
    {{--                // <!-- Twitter Conversion Tracking -->--}}
    {{--                window.twq('track', 'Purchase', {--}}
    {{--                    //required parameters--}}
    {{--                    value: order_amount,--}}
    {{--                    currency: 'USD',--}}
    {{--                    num_items: '{{ $total_products }}',--}}
    {{--                });--}}
    {{--                clearInterval(twitterTimer);--}}
    {{--            }--}}
    {{--        }, 100);--}}

    {{--            var facebookTimer = setInterval(function () {--}}
    {{--            if (window.fbq) {--}}
    {{--                // <!-- Event snippet for Purchase - Facebook Pixel Code -->--}}
    {{--                window.fbq('track', 'Purchase',--}}
    {{--                    // begin parameter object data--}}
    {{--                    {--}}
    {{--                        value: order_amount,--}}
    {{--                        currency: 'USD',--}}
    {{--                        contents: [--}}
    {{--                                @if(isset($order))--}}
    {{--                                @foreach($cart->items as $key => $product)--}}
    {{--                            {--}}
    {{--                                "id": 'SKU-{{ str_pad($product['item']['id'], 4, '0', STR_PAD_LEFT) }}',--}}
    {{--                                "quantity": '{{ $product['qty'] }}'--}}
    {{--                            },--}}
    {{--                                @endforeach--}}
    {{--                                @else--}}
    {{--                                @foreach($cart['items'] as $key => $product)--}}
    {{--                            {--}}
    {{--                                "id": 'SKU-{{ str_pad($product['id'], 4, '0', STR_PAD_LEFT) }}',--}}
    {{--                                "quantity": '{{ $product['quantity'] }}'--}}
    {{--                            },--}}
    {{--                            @endforeach--}}
    {{--                            @endif--}}
    {{--                        ],--}}
    {{--                        content_type: 'product',--}}
    {{--                        transaction_id: order_uid--}}
    {{--                    },--}}
    {{--                    // end parameter object data--}}
    {{--                    {eventID: order_uid}--}}
    {{--                );--}}
    {{--                clearInterval(facebookTimer);--}}
    {{--            }--}}
    {{--        }, 100);--}}
    {{--    </script>--}}
    {{--    <!-- BEGIN GCR Opt-in Module Code -->--}}
    {{--    <script src="https://apis.google.com/js/platform.js?onload=renderOptIn" async defer></script>--}}
    {{--    <script>--}}
    {{--        window.renderOptIn = function () {--}}
    {{--            window.gapi.load('surveyoptin', function () {--}}
    {{--                window.gapi.surveyoptin.render({--}}
    {{--                    "merchant_id": 290196617,--}}
    {{--                    "order_id": order_uid,--}}
    {{--                    "email": order_email,--}}
    {{--                    "delivery_country": "US",--}}
    {{--                    "estimated_delivery_date": "{{ \Carbon\Carbon::now()->toDateString() }}",--}}
    {{--                    "opt_in_style": "CENTER_DIALOG"--}}
    {{--                });--}}
    {{--            });--}}
    {{--        }--}}
    {{--    </script>--}}
    {{--    <!-- END GCR Opt-in Module Code -->--}}

    {{--    <script type='text/javascript'>--}}
    {{--        @php--}}
    {{--            if(isset($order)){--}}
    {{--                $order->is_gtag_submitted = true;--}}
    {{--                $order->save();--}}
    {{--            } else {--}}
    {{--                $group_order->is_gtag_submitted = true;--}}
    {{--                $group_order->save();--}}
    {{--            }--}}
    {{--        @endphp--}}

    {{--        @endif--}}
    {{--    </script>--}}

    @if(strpos(Route::currentRouteName(), 'course.') !== false || str_contains(Route::currentRouteName(), 'customPromotion'))
        @php
            if(isset($course_content['price'])){
                $product_price = number_format($course_content['price'], 2);
                if(isset($course_content['discounted_price']) && $course_content['discounted_price'] > 0) {
                    $product_price = number_format($course_content['discounted_price'], 2);
                }
                $product_sku = "SKU-".str_pad($course->id, 4, '0', STR_PAD_LEFT);
                $product_title = $course_content['title'];
            } else {
                $product_price = number_format($product->price, 2);
                $product_sku = "SKU-".str_pad($product->id, 4, '0', STR_PAD_LEFT);
                $product_title = $product->title;
            }
        @endphp
        <script type="text/javascript">
            gtag('event', 'view_item', {
                'send_to': 'AW-945079766',
                "price": parseFloat('{{ $product_price  }}'),
                "value": parseFloat('{{ $product_price  }}'),
                'items': [{
                    'id': '{{ $product_sku }}',
                    "name": '{{ $product_title }}',
                    "brand": "OSHA Outreach Courses",
                    "category": "Online Courses",
                    "quantity": 1,
                    "price": parseFloat('{{ $product_price  }}'),
                    "value": parseFloat('{{ $product_price  }}'),
                    'google_business_vertical': 'education'
                }, {
                    'id': '{{ $product_sku }}',
                    "name": '{{ $product_title }}',
                    "brand": "OSHA Outreach Courses",
                    "category": "Online Courses",
                    "quantity": 1,
                    "price": parseFloat('{{ $product_price  }}'),
                    "value": parseFloat('{{ $product_price  }}'),
                    'google_business_vertical': 'custom'
                }]
            });

            var facebookViewContentTimer = setInterval(function () {
                if (window.fbq) {
                    /* ViewContent Pixel Event */
                    window.fbq("track", "ViewContent", {
                        content_ids: '{{ $product_sku }}',
                        content_name: '{{ $product_title }}',
                        content_type: "Course",
                        currency: "USD",
                        value: parseFloat('{{ $product_price  }}'),
                    }, {eventID: '{{ session('unique_event_id') }}'});
                    /* ViewContent Pixel Event */

                    /* AddToCart Event */
                    var enroll_now_btns = document.getElementsByClassName("enroll_now_btn");
                    for (var i = 0; i < enroll_now_btns.length; i++) {
                        enroll_now_btns[i].addEventListener('click', function () {
                                window.fbq('track', 'AddToCart', {
                                    content_ids: ['{{ $product_sku }}'],
                                    content_type: 'product_group',
                                    currency: "USD",
                                    value: '{{ $product_price }}'
                                }, {eventID: '{{ session('unique_event_id') }}'})
                            }
                            , false);
                    }
                    /* AddToCart Event */
                    clearInterval(facebookViewContentTimer);
                }
            }, 100);
        </script>
    @endif
@endif
<meta name="ahrefs-site-verification" content="92d8b1e89c7edcda9710bfbb837c95ca482c5aa065549f60af6924375d2824cb">
