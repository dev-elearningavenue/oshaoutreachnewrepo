<header class="top-bar" style="max-height: 33px;">
    <div class="container">
        <div class="row">
            {{--<div class="col-xs-12 col-md-2 text-sm-center">
                @if(Route::currentRouteName() == 'course.osha-10-hour-construction' )
                    <span class="contact-number"><a href="{{ route('course.osha-10-construction-spanish') }}"><strong>Spanish - OSHA 10 Construction</strong></a></span>
                @else
                    <span class="contact-number">New York - <a href="{{ route('course.new-york-osha-10-hour-construction') }}"><strong>OSHA 10</strong></a> | <a href="{{ route('course.new-york-osha-30-hour-construction') }}"><strong>OSHA 30</strong></a></span>
                @endif
            </div>--}}
            <div class="hidden-sm-down col-xs-12 col-md-7 col-lg-6">
                <div class="top-nav ta-left">
                    <ul class="inline unstyled">
                        {{--@if(Auth::check())
                        <li class="hidden-sm-down"><a href="{{ route('user.profile') }}">Profile</a></li>
                        <li class="hidden-sm-down"><a href="{{ route('user.logout') }}">Logout</a></li>
                        @else
                        <li class="hidden-sm-down"><a href="{{ route('user.signin') }}">Sign in</a></li>
                        <li class="hidden-sm-down"><a href="{{ route('user.signup') }}">Register</a></li>
                        @endif--}}
                        <li class="hidden-xs-down"><a href="mailto:help@oshaoutreachcourses.com" class="contact-number"><span class="icon-email" aria-hidden="true"></span>&nbsp;help@oshaoutreachcourses.com</a></li>
                        <li><a href="tel:+18332126742" class="contact-number"><span class="icon-phone" aria-hidden="true"></span>&nbsp;+1-833-212-6742</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-md-5 col-lg-6">
                <div class="top-nav ta-right">
                    <ul class="inline unstyled">
                        <li class="hidden-sm-up" style="border:none;"><a href="tel:+18332126742" class="contact-number"><span class="icon-phone" aria-hidden="true"></span>&nbsp;+1-833-212-6742</a></li>
                        @if(isset($promotionNav))
                            <li></li>
                            <li style="border-left: 1px solid;" id="profile"></li>
                        @else
                            <li class="hidden-sm-down" style="border:none">
                                <form action="{{ route('courses') }}" method="GET">
                                    <button type="submit" style="border:none;"><i class="xicon icon-search"></i><span class="hidden-md-down">Search</span></button>
                                    <input type="text" name="keyword" value="{{ old('keyword') }}" style="background: rgba(0,0,0,0);border:none; border-bottom: 1px solid; padding: 4px 3px; outline: 0; height: 20px;  width: 150px;border-radius: 0;" autocomplete="occ-keyword">
                                    <input type="hidden" name="language" value="all" autocomplete="off">
                                </form>
                            </li>
                            <li style="border-left: 1px solid;" id="profile"></li>
                        @endif
                        @if(Session::has('comingFromSalePage') || !str_contains(Route::currentRouteName(), 'customPromotion'))
                        <li>
                            <a href="{{ route('order.details') }}" class="shopping-cart" title="Shopping Cart">
                                <i class="icon-cart" aria-hidden="true">
                                </i>
                                <small class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '0' }}</small>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<header class="primary-header" style="max-height: 141px;">
    <div class="container">
        <div class="row">
            <div class="{{isset($promotionNav) ? 'offset-md-5 col-md-3' : 'col-md-3 col-xs-8'}}">
                    <a href="{{ route('home') }}" class="header-logo" id="header-logo">
                        <picture>
                            <source srcset="{{ asset('/images/osha-outreach-courses.webp') }}" type="image/webp">
                            <source srcset="{{ asset('/images/osha-outreach-courses.png') }}" type="image/png">
                            <img src="{{ asset('/images/osha-outreach-courses.png') }}" alt="OSHA Outreach Courses" title="OSHA Outreach Courses">
                        </picture>
                    </a>
            </div>
            @if(!isset($promotionNav))
                <div class="col-lg-9 col-md-12 col-xs-4">
                    <nav class="hidden-sm-down">
                        <ul class="unstyled inline navigation">
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('about-us') }}">About us</a>
                            </li>
                            <li>
                                <a href="{{ route('osha-10-hour-online') }}">OSHA 10</a>
                            </li>
                            <li>
                                <a href="{{ route('osha-30-hour-online') }}">OSHA 30</a>
                            </li>
                            <li>
                                <a href="{{ route('courses') }}">All Courses</a>
                                <ul class="unstyled dropdown">
                                    <li>
                                        <a href="{{ route('course.osha-30-hour-construction') }}">OSHA 30-Hour Construction</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/osha-30-hour-general-industry') }}">OSHA 30-Hour General Industry</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('course.osha-10-hour-construction') }}">OSHA 10-Hour Construction</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('course.osha-10-hour-general') }}">OSHA 10-Hour General Industry</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('course.osha-10-construction-spanish') }}">OSHA 10 Construction (Español)</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('course.osha-30-hour-construction-spanish') }}">OSHA 30-Hour Construction (Español)</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/osha-30-hour-general-industry-spanish') }}">OSHA 30-Hour General Industry (Español)</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/osha-10-hour-general-industry-spanish') }}">OSHA 10-Hour General Industry (Español)</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('course.new-york-osha-30-hour-construction') }}">New York 30-Hour Construction</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/ny-osha-30-hour-general-industry') }}">New York 30-Hour General </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/new-york-osha-10-hour-construction') }}">New York 10-Hour Construction</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('course.new-york-osha-10-hour-general') }}">New York 10-Hour General</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('course.new-york-osha-10-hour-construction-spanish') }}">New York 10-Hour Construction (Español)</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('course.new-york-osha-30-hour-construction-spanish') }}">New York 30-Hour Construction (Español)</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/ny-osha-10-hour-general-industry-spanish') }}">New York 10-Hour General (Español)</a>
                                    </li>
                                    {{-- <li> --}}
                                    {{-- <a href="{{ url('/osha-10-and-30-hour-construction') }}">OSHA 10 & 30 HOUR CONSTRUCTION</a> --}}
                                    {{-- </li> --}}
                                    <li>
                                        <a href="{{ route('courses') }}">View All</a>
                                    </li>
                                    {{--<li>
                                        <a href="{{ route('courses') }}">More Courses</a>
                                    </li>--}}
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('group-enrollment') }}">Group Discount</a>
                            </li>
                            <li>
                                <a href="{{ url('blog') }}/" target="_blank">Blog</a>
                            </li>
                            <li>
                                <a href="{{ route('reviews') }}">Reviews</a>
                            </li>
                            {{-- <li>
                                <a class="highlight" href="{{  route('partner-with-us')  }}">Partner With Us</a>
                            </li> --}}
                            <li>
                                <a class="highlight" href="{{  route('free-signup')  }}">FREE SIGN UP</a>
                            </li>
                            {{--<li>
                                <a href="{{ route('contact-us') }}">Contact</a>
                            </li>--}}
                        </ul>
                    </nav>
                    <!-- Mobile Navigation Button Start-->
                    <div class="mobile-nav-btn float-xs-right hidden-md-up">
                        <span class="lines"></span>
                        <span class="lines"></span>
                        <span class="lines"></span>
                        <span class="lines"></span>
                    </div>
                    <!-- Mobile Navigation Button End-->
                    <!-- Mobile Navigation START -->
                    <nav class="mobile-nav ta-center">
                        <ul class="unstyled mobile-navigation">
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('about-us') }}">About us</a>
                            </li>
                            <li>
                                <a href="{{ route('osha-10-hour-online') }}" class="fw-bold">OSHA 10 Hour</a>
                            </li>
                            <li>
                                <a href="{{ route('osha-30-hour-online') }}" class="fw-bold">OSHA 30 Hour</a>
                            </li>
                            {{--<li>
                                <a href="{{ route('course.osha-10-hour-construction') }}">OSHA 10-Hour Construction</a>
                            </li>
                            <li>
                                <a href="{{ route('course.osha-10-construction-spanish') }}">OSHA 10 Construction (Spanish)</a>
                            </li>
                            <li>
                                <a href="{{ route('course.osha-30-hour-construction') }}">OSHA 30-Hour Construction</a>
                            </li>
                            <li>
                                <a href="{{ route('course.osha-10-hour-general') }}">OSHA 10-Hour General Industry</a>
                            </li>--}}
                            {{--<li>--}}
                            {{--<a href="{{ route('course.osha-30-hour-general') }}">OSHA 30-Hour General Industry</a>--}}
                            {{--</li>--}}
                            {{--<li>
                                <a href="{{ route('course.new-york-osha-10-hour-construction') }}">New York OSHA 10-Hour Construction</a>
                            </li>
                            <li>
                                <a href="{{ route('course.new-york-osha-30-hour-construction') }}">New York OSHA 30-Hour Construction</a>
                            </li>--}}
                            <li><a href="{{ route('courses') }}">All Courses</a></li>
                            <li>
                                <a href="{{ route('group-enrollment') }}">Group Discount</a>
                            </li>
                            <li>
                                <a href="{{ url('blog') }}">Blog</a>
                            </li>
                            <li>
                                <a href="{{ route('reviews') }}">Reviews</a>
                            </li>
                            {{-- <li>
                                <a class="fw-bold" href="{{  route('partner-with-us')  }}">Partner With Us</a>
                            </li> --}}
                            <li>
                                <a class="highlight" href="{{  route('free-signup')  }}">FREE SIGN UP</a>
                            </li>
                            <li>
                                <a href="{{ route('contact-us') }}">Contact</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- Mobile Navigation END -->
                </div>
            @endif
        </div>
    </div>
</header>
