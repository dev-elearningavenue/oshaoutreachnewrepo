<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <title>@yield('title') | OSHA Outreach Courses</title>
    <meta name="keywords" content="<?php echo isset($keywords) ? $keywords : 'Keywords' ?>" />
    <meta name="description" content="Welcome to OSHA outreach courses! We specialize in online safety training for OSHA. Our interactive online courses include the OSHA 10-hour and OSHA 30-hour for construction and general industry." />
    <link rel="icon" type="image/x-icon" href="/favicon.ico" />
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16" />
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <noscript id="deferred-styles">
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700|Source+Sans+Pro:400,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('src/css/app.css') }}" />
    </noscript>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
    var loadDeferredStyles = function() {
        var addStylesNode = document.getElementById("deferred-styles");
        var replacement = document.createElement("div");
        replacement.innerHTML = addStylesNode.textContent;
        document.body.appendChild(replacement);
        addStylesNode.parentElement.removeChild(addStylesNode);
    };
    var raf = requestAnimationFrame || mozRequestAnimationFrame ||
        webkitRequestAnimationFrame || msRequestAnimationFrame;
    if (raf) raf(function() { window.setTimeout(loadDeferredStyles, 0); });
    else window.addEventListener('load', loadDeferredStyles);
    </script>
    <style>
        .no-js #loader { display: none;  }
        .js #loader { display: block; position: absolute; left: 100px; top: 0; }
        .pre-loading {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('{{asset('/images/header-logo.png')}}') center no-repeat #fff;
        }
    </style>
    @yield('styles')
</head>

<body class="<?php echo isset($pageclass) ? $pageclass : 'homepg'; ?>">
    <!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
    <div class="pre-loading"></div>
    <main class="app-container">
        @include('partials.navigation')
        <div class="container-fluid">
            <div class="row" style="min-height:60vh;padding-top: 20px;border-top: 2px solid;">
                <div class="col-md-2">
                    <h3 class="btn --btn-primary --btn-small mbpx-10 ta-center w-100">Menu</h3>
                    <ul class="sidebar-menu">
                        <li class="{{ Route::currentRouteName() == "admin.dashboard" ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        @if(Auth::user()->type == USER_TYPE_ADMIN)
                            <li class="{{ Route::currentRouteName() == "admin.orders" && empty(request()->input('user_id')) ? 'active' : '' }}"><a href="{{ route('admin.orders') }}">Orders</a></li>
                            <li class="{{ Route::currentRouteName() == "admin.zero_dollar_orders" ? 'active' : '' }}"><a href="{{ route('admin.zero_dollar_orders') }}">0$ Orders</a></li>
                            <li class="{{ Route::currentRouteName() == "admin.orders" && request()->input('user_id') == '3' ? 'active' : '' }}"><a href="{{ route('admin.orders').'?user_id=3' }}">BDM 1 (Maaz)</a></li>
                            <li class="{{ Route::currentRouteName() == "admin.orders" && request()->input('user_id') == '4' ? 'active' : '' }}"><a href="{{ route('admin.orders').'?user_id=4' }}">BDM 2 (Asif)</a></li>
                            <li class="{{ Route::currentRouteName() == "admin.orders" && request()->input('user_id') == '5' ? 'active' : '' }}"><a href="{{ route('admin.orders').'?user_id=5' }}">BDM 3 (Imad)</a></li>
                            <li class="{{ Route::currentRouteName() == "admin.orders" && request()->input('user_id') == '9' ? 'active' : '' }}"><a href="{{ route('admin.orders').'?user_id=9' }}">BDM 4 (Humna)</a></li>
                            <li class="{{ Route::currentRouteName() == "admin.get-deleted-orders" ? 'active' : '' }}"><a href="{{ route('admin.get-deleted-orders') }}">Deleted Orders</a></li>
                            <li class="{{ Route::currentRouteName() == "state-promotion.index" ? 'active' : '' }}"><a href="{{ route('state-promotion.index') }}">State Guidelines</a></li>
                            @if(in_array(Auth::user()->id, [1,6]))
                                <li class="{{ str_contains(Route::currentRouteName(), 'admin.users') == "admin.users" ? 'active' : '' }}"><a href="{{ route('admin.users') }}">Users</a></li>
                            @endif
                            <li class="{{ Route::currentRouteName() == "coupons.index" ? 'active' : '' }}"><a href="{{ route('coupons.index') }}">Coupons</a></li>
                            <li class="{{ Route::currentRouteName() == "admin.group_enrollments_enquiries" && empty(request()->input('user_id')) ? 'active' : '' }}"><a href="{{ route('admin.group_enrollments_enquiries') }}">Group Enrollment Enquiries</a></li>
                            <li class="{{ Route::currentRouteName() == "admin.group_enrollments_enquiries" && request()->input('user_id') == '3' ? 'active' : '' }}"><a href="{{ route('admin.group_enrollments_enquiries').'?user_id=3' }}">BDM 1 (Maaz) Group</a></li>
                            <li class="{{ Route::currentRouteName() == "admin.group_enrollments_enquiries" && request()->input('user_id') == '4' ? 'active' : '' }}"><a href="{{ route('admin.group_enrollments_enquiries').'?user_id=4' }}">BDM 2 (Asif) Group</a></li>
                            <li class="{{ Route::currentRouteName() == "admin.group_enrollments_enquiries" && request()->input('user_id') == '5' ? 'active' : '' }}"><a href="{{ route('admin.group_enrollments_enquiries').'?user_id=5' }}">BDM 3 (Imad) Group</a></li>
                            <li class="{{ Route::currentRouteName() == "admin.group_enrollments_enquiries" && request()->input('user_id') == '9' ? 'active' : '' }}"><a href="{{ route('admin.group_enrollments_enquiries').'?user_id=9' }}">BDM 4 (Humna) Group</a></li>
                            <li class="{{ strpos(Route::currentRouteName(), "admin.pages") !== false ? 'active' : '' }}"><a href="{{ route('admin.pages') }}">Pages</a></li>
                            <li class="{{ strpos(Route::currentRouteName(), "admin.courses") !== false ? 'active' : '' }}"><a href="{{ route('admin.courses') }}">Courses</a></li>
                            <li class="{{ strpos(Route::currentRouteName(), "admin.group_slabs") !== false ? 'active' : '' }}"><a href="{{ route('admin.group_slabs') }}">Group Slabs</a></li>
                            <li><a target="_blank" href="{{ route('admin.remove_unpaid_orders_of_paid_orders') }}"><strong style="color: red">Remove Unpaid Orders</strong></a></li>
                            <li><a href="{{ route('admin.regenerate_sitemap') }}"><strong style="color: blue">Regenerate Sitemap</strong></a></li>
                            <li><a href="{{ route('admin.optimize_cache_clear') }}"><strong style="color: blue">Clear Cache</strong></a></li>
                        @elseif(Auth::user()->type == USER_TYPE_DIGITAL_MARKETER)
                            <li class="{{ strpos(Route::currentRouteName(), "admin.pages") !== false ? 'active' : '' }}"><a href="{{ route('admin.pages') }}">Pages</a></li>
                            <li class="{{ strpos(Route::currentRouteName(), "admin.courses") !== false ? 'active' : '' }}"><a href="{{ route('admin.courses') }}">Courses</a></li>
                        @elseif(Auth::user()->type == USER_TYPE_BDM)
                            <li class="{{ Route::currentRouteName() == "admin.orders" && !request()->has('all') ? 'active' : '' }}"><a href="{{ route('admin.orders') }}">Orders</a></li>
                            <li class="{{ Route::currentRouteName() == "admin.group_enrollments_enquiries" && !request()->has('all') ? 'active' : '' }}"><a href="{{ route('admin.group_enrollments_enquiries') }}">Group Enrollment Enquiries</a></li>
                            {{--All Orders--}}
                            <li class="{{ Route::currentRouteName() == "admin.orders" && request()->has('all') ? 'active' : '' }}"><a href="{{ route('admin.orders') }}?all=1&start_date={{ \Carbon\Carbon::now()->startOfYear()->format('Y-m-d') }}&end_date=">All Orders</a></li>
                            <li class="{{ Route::currentRouteName() == "admin.group_enrollments_enquiries" && request()->has('all') ? 'active' : '' }}"><a href="{{ route('admin.group_enrollments_enquiries') }}?all=1">All Group Enrollment Enquiries</a></li>
                            {{--All Orders--}}
                            <li class="{{ Route::currentRouteName() == "admin.call_logs" ? 'active' : '' }}"><a href="{{ route('admin.call_logs') }}">Call Logs</a></li>
                            <li class="{{ Route::currentRouteName() == "bdm.leeds_list" ? 'active' : '' }}"><a href="{{ route('bdm.leeds_list') }}">Leeds</a></li>
                        @elseif(Auth::user()->type == USER_TYPE_SUPPORT)
                            <li class="{{ Route::currentRouteName() == "admin.orders" && empty(request()->input('user_id')) ? 'active' : '' }}"><a href="{{ route('admin.orders') }}">Orders</a></li>
                            <li class="{{ Route::currentRouteName() == "admin.zero_dollar_orders" ? 'active' : '' }}"><a href="{{ route('admin.zero_dollar_orders') }}">0$ Orders</a></li>
                            <li class="{{ Route::currentRouteName() == "admin.orders" && request()->input('user_id') == '3' ? 'active' : '' }}"><a href="{{ route('admin.orders').'?user_id=3' }}">BDM 1 Orders</a></li>
                            <li class="{{ Route::currentRouteName() == "admin.orders" && request()->input('user_id') == '4' ? 'active' : '' }}"><a href="{{ route('admin.orders').'?user_id=4' }}">BDM 2 Orders</a></li>
                            <li class="{{ Route::currentRouteName() == "admin.orders" && request()->input('user_id') == '5' ? 'active' : '' }}"><a href="{{ route('admin.orders').'?user_id=5' }}">BDM 3 Orders</a></li>
                        @endif

                        <li><a href="/admin/logout">Logout</a></li>
                    </ul>
                </div>
                <div class="col-md-10">
                    @yield('content')
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>Copyright &copy; {{ date('Y') }} <span class="fc-primary"> OSHA Outreach Courses</span></p>
        </div>
    </main>
    <style>
        .ck-editor__editable_inline ul {
            margin-left: 15px;
        }

        .ck-editor__editable {
            min-height: 200px;
            list-style-type: circle !important;
        }

        ul.sidebar-menu{
            background: #f2f3f2;
            font-size: 16px;
        }
        ul.sidebar-menu li{
            border: 1px solid #1f1d1e;
            list-style-type: none;
            padding: 10px;
            border-bottom: none;
        }
        ul.sidebar-menu li.active a{
            color: #005384 ;
            font-weight: 600;
        }
        ul.sidebar-menu li:last-child{
            border-bottom: 1px solid #1f1d1e;

        }
    </style>
    <!-- <div class="overlay-bg"></div> -->
    <script type="text/javascript" src="{{ asset('src/js/functions.js') }}"></script>
    <script type="text/javascript" src="{{ asset('src/js/SmoothScroll.js') }}"></script>
    <script type="text/javascript" src="{{ asset('src/js/script.js') }}"></script>
    <!-- jQuery Datatable -->
    <link rel="stylesheet" href="{{ asset('src/css/jquery.dataTables.min.css')}}"/>
    <script type="text/javascript" src="{{ asset('src/js/jquery.dataTables.min.js') }}"></script>
    <script>
    $(window).load(function() {
        // Animate loader off screen
        $(".pre-loading").fadeOut("slow");
    });
    </script>
    @yield('scripts')
</body>
</html>
