@php
    $gotoRoute = "https://lms.oshaoutreachcourses.com/";
    $fetchProfile = "true";

    if(str_contains(url()->previous(), 'order-details') || str_contains(url()->previous(), 'group-enrollment')) {
        $gotoRoute = url()->previous();
        $fetchProfile = "true";
    }
@endphp
@extends('layouts.master')

@section('title', isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'LMS Login | '.config('app.name') )

@section('styles')
    @if(isset($page['seo_tags']))
        @foreach($page['seo_tags'] as $meta_name => $meta_content)
            @if($meta_name != 'title')
                <meta name="{{ $meta_name }}" content="{{ $meta_content }}"/>
            @endif
        @endforeach
    @endif
    <meta property="og:title"
          content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'LMS Login' }}">
    <meta property="twitter:title"
          content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'LMS Login' }}">
    <meta property="og:description"
          content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'LMS Login' }}">
    <meta property="twitter:description"
          content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'LMS Login' }}">
    <meta property="og:image" content="{{ url('/images/osha-outreach-courses.png') }}">
    <meta property="twitter:image" content="{{ url('/images/osha-outreach-courses.png') }}">
    <!-- Meta Tags for Social Media -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="OSHA Outreach Courses">
    <meta property="fb:app_id" content="817832821974771"/>
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:site" content="@OshaOutreach">
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "BreadcrumbList",
        "name": "Breadcrumb",
        "itemListElement": {
            "@type": "ListItem",
            "position": 1,
            "name": "{{ isset($page['h1_heading']) ? $page['h1_heading'] : 'LMS Login' }}"
        }
    }




    </script>
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "VideoObject",
          "name": "Why Safety Training is Important to You?",
          "description": "There were 5,333 fatal work injuries recorded in the United States in 2019, A 2% increase from the 5,250 in 2018.
                        • The 5,333 fatal occupational injuries in 2019 represents the largest annual number since 2007.
                        • A worker died every 99 minutes from a work-related injury in 2019.
                        • Falls, slips, and trips increased 11 percent in 2019 to 880.
                        At Osha Outreach Courses we specialize in providing online occupational safety and health training. We have an extensive library of online training to help people achieve optimum results in their respective fields.",
          "thumbnailUrl": [
            "https://i.ytimg.com/vi_webp/woyOqTp1FYg/maxresdefault.webp"
           ],
          "uploadDate": "2021-03-19",
          "duration": "PT58S",
          "contentUrl": "https://www.youtube.com/watch?v=woyOqTp1FYg&ab_channel=OshaOutreachCourses",
          "embedUrl": "https://www.youtube.com/embed/woyOqTp1FYg"
        }




    </script>
    <style>
        span.giftCardText span.giftQuanitity {
            font-size: 30px;
            font-weight: 700;
        }

        span.giftCardText a {
            border-radius: 5px;
            border: 1px solid #fff;
            padding: 10px 15px;
            background: #fff;
            color: #1d81c2;
            margin-top: 10px;
            display: inline-block;
            transition: ease all 0.25s;
        }
        span.giftCardText a:hover{
            background:#1d81c2;
            color:#fff;
        }

        span.giftCardText {
            font-size: 22px;
            margin-bottom:30px;
            font-weight: 600;
            margin-top: 15px;
            display: block;
            text-align: center;
            text-transform: uppercase;
            background: #1d81c2;
            padding: 50px 0;
            color: #fff;
            line-height: 1;
        }
        #get-review {
            background-color: #e5eef5;
        }

        #get-review .col-md-6 {
            padding: 4% 0;
        }

        #get-review a {
            background-color: #ffb900;
            font-size: 14px;
            font-weight: bold;
            margin: 23% 0;
        }

        #get-review a:hover {
            color: #757575;
        }

        #get-review h3 {
            font-size: 26px;
        }

        #get-review p {
            font-size: 20px;
            color: #757575;
        }

        .fc-red {
            color: #ff0000 !important;
        }

        @media (max-width: 785px) {
            #get-review .col-md-6 {
                padding: 0;
            }

            #get-review h3 {
                text-align: center;
            }

            #get-review p {
                text-align: center;
            }

            #get-review a {
                margin-top: 20px;
                margin-bottom: 30px;
            }
        }

        .videoWrapper {
            border: 4px solid #FFF;
            position: relative;
            padding-bottom: 56.25%; /* 16:9 */
            height: 0;
            /* falls back to 16/9, but otherwise uses ratio from HTML */
            padding-bottom: calc(var(--aspect-ratio, .5625) * 100%);
        }

        .videoWrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
@endsection

@section('content')
    <span class="giftCardText">WIN <span class="giftQuanitity">$10</span> STARBUCKS GIFT CARD ON EVERY VIDEO SURVEY <br><a href="https://www.shopperapproved.com/surveys/full.php?id=33391" target="_blank">WIN YOUR GIFT CARD NOW!</a></span>
    <div class="page-heading">
        <h1 class="title mbpx-0">{{ isset($page['h1_heading']) ? $page['h1_heading'] : 'LMS Login' }}</h1>
        <p class="subtitle"></p>
    </div>
    <section class="sec-padding cart-form mtpx-30">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <form
                          action="https://oshaoutreachcourses.puresafety.com/OnDemand/Home/Login"
                          method="post"
                          id="login-form">
                        <div class="control-group focused">
                            <label class="form-label">User Name</label>
                            <input autocomplete="off" value="{{ $username }}" id="LoginName" maxlength="255"
                                   name="LoginName" type="text" value="" class="form-field" required/>
                        </div>
                        <div class="control-group focused">
                            <label class="form-label">Password</label>
                            <input autocomplete="off" value="{{ $password }}" id="Password" maxlength="255"
                                   name="Password" type="password" value="" class="form-field" required/>
                            {{--<button type="button" id="password_sh_btn"><i class="xicon icon-hide" title="Show Password"></i></button>--}}
                            <button type="button" id="password_sh_btn" class="fc-primary">Show</button>
                        </div>
                        <div class="ta-center">
                            <input type="submit" class="btn --btn-primary mtpx-0 mbpx-20" value="Log In" id="login-btn">
                        </div>
                        <input id="CompanyName" maxlength="255" name="CompanyName" type="hidden" value="OSHA Outreach">
                        <input id="FormName" name="FormName" type="hidden" value="Login">
                        <input id="returnTo" name="returnTo" type="hidden" value="">
                    </form>
                </div>
            </div>

        </div>
    </section>

    <section class="bg-secondary sec-padding" style="background-color: #1d81c2;">
        <div class="container pr-5 pl-5" style="max-width:800px;">
            <div class="page-heading mbpx-40">
                <h2 class="title mbpx-0 fc-white" style="font-size: 26px;">Why Safety Training is Important to You?</h2>
            </div>

            <div class="videoWrapper" style="--aspect-ratio: 9 / 16;" data-nosnippet>
                <!-- Copy & Pasted from YouTube -->
                <iframe id="ytplayer" width="420" height="315"
                        src="https://www.youtube.com/embed/woyOqTp1FYg?rel=0&color=white&iv_load_policy=3&showinfo=0&autohide=1"
                        frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </section>

    {{--    <section id="get-review">--}}
    {{--        <div class="container ">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-md-3 col-xs-12  push-md-6">--}}
    {{--                    <img src="{{ asset('/images/get_review.png') }}" alt="Leave a review" class="m-auto">--}}
    {{--                </div>--}}
    {{--                <div class="col-md-6 pull-md-3">--}}
    {{--                    <h3>How was your learning experience?</h3>--}}
    {{--                    <p class="desc">Your feedback is important to us.</p>--}}
    {{--                </div>--}}
    {{--                <div class="col-md-3 ta-center">--}}
    {{--                    <a href="https://www.trustpilot.com/evaluate/www.oshaoutreachcourses.com" rel="nofollow" target="_blank" class="btn btn-primary">LEAVE A REVIEW</a>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}

    @include('partials._promotional_courses_slider', ['heading' => 'Popular Courses', 'social' => true])
@endsection

@section('scripts')
    <script async src="https://static.addtoany.com/menu/page.js"></script>
    {{--<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5e2438b9e3293e00120849c5' async='async'></script>--}}
    <style>
        #password_sh_btn {
            all: unset;
            position: relative;
            left: 88%;
            top: -32px;
            z-index: 10;
            color: #005384;
            font-weight: 600;
        }

        #password_sh_btn i {
            cursor: pointer;
        }

        .a2a_kit span.a2a_svg {
            border-radius: 25px !important;
            padding: 5px;
            width: 50px !important;
            line-height: 50px !important;
            height: 50px !important;
            background-size: 50px !important;

        }

        .a2a_kit a {
            margin-right: 5px;
        }

        .a2a_kit a.a2a_button_facebook img {
            border-radius: 25px;
        }
    </style>
    <script>
        $(document).ready(function () {
            var $fetchProfile = "{{$fetchProfile}}";

            $('#password_sh_btn').click(function () {
                if ($(this).text() == 'Hide') {
                    $(this).text('Show')
                    $('#Password').attr('type', 'password');
                } else {
                    $(this).text('Hide')
                    $('#Password').attr('type', 'text');
                }
            });

            $('#login-form').bind('submit', function (e) {
                e.preventDefault();
                $('#login-form input').attr('disabled', 'disabled');
                $('#login-btn').val('Submitting...');
                $.ajax({
                    url: '/check_login',
                    data: {
                        'username': $('#LoginName').val(),
                        'password': $('#Password').val()
                    },
                    method: 'POST',
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}'
                    },
                    success: function (data) {
                        console.log(data);
                        // console.log(data.response.search('The user name or password you entered is incorrect'));
                        if (data.success === false) {
                            $('#login-form input').removeAttr('disabled');
                            $('#login-btn').val('Log In');
                            alert('This may be the Reason:\n' +
                                '- Payments made in last 2 hours are under verification. \n' +
                                '- The username or password you entered is incorrect. Please correct and try again.');
                            return false;
                        } else {
                            if (data.type === 1) {
                                $('#login-form input').removeAttr('disabled');
                                $('#login-form').unbind('submit');
                                $('#login-form').submit();
                                // return true;
                            } else if (data.type === 2) {
                                let myDate = new Date();
                                myDate.setMonth(myDate.getMonth() + 12);
                                document.cookie = 'osha-outreach-token=' + data.response.token + ';expires=' + myDate + ';domain=.oshaoutreachcourses.com;path=/';

                                if($fetchProfile === "true") {
                                    var myHeaders = new Headers();
                                    myHeaders.append("Authorization", "Bearer "+data.response.token);

                                    var requestOptions = {
                                        method: 'GET',
                                        headers: myHeaders,
                                        // redirect: 'follow'
                                    };

                                    fetch("{{ env('LMS_API_URL') }}/profile", requestOptions)
                                        .then((response) => response.json())
                                        .then((data) => {
                                            document.cookie = `osha-outreach-profile=${JSON.stringify(data)};expires=${myDate};domain=.oshaoutreachcourses.com;path=/`;
                                            // console.log(data,356);
                                            window.location = "{{ $gotoRoute }}";
                                        })
                                        .catch((err) => console.log(err));
                                } else {
                                    window.location = "{{ $gotoRoute }}";
                                }
                                // return true;
                            }
                        }
                    }
                });
            });
        });
    </script>
@endsection
