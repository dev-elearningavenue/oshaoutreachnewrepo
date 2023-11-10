@php
    if (isset($slug)) {
        $reviewDetails = \App\Models\VideoReview::query()
            ->where('slug', $slug)
            ->first();
    } else {
        // Get random video review everytime
        $reviewDetails = \App\Models\VideoReview::query()
            ->inRandomOrder()
            ->first();
    }
@endphp
@push('custom-css')
    .videoPopUpBox{
    background: #fff;
    padding-top:50px;
    cursor: pointer;
    padding: 20px;
    border: 1px solid #eee;
    box-shadow: 0px 0px 10px 0px rgb(0 0 0 / 20%);
    z-index: 0;
    position: relative;
    }

    .videoPopUpBox .VideoPopBtnWrapper svg {
    width: 50px;
    margin-right: 15px;
    }
    #videoReviewMain {
    font-family: 'Open Sans', sans-serif;
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    }
    #videoReviewMain .modal {
    width: 600px;
    height: 400px;
    background-color: #f0f1f2;
    z-index: 1;
    position: absolute;
    margin: auto;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    border-radius: 4px;
    -webkit-animation: popin 0.3s;
    animation: popin 0.3s;
    }
    #videoReviewMain .modal-title {
    font-size: 18px;
    background-color: #252525;
    color: #fff;
    padding: 10px;
    margin: 0;
    border-radius: 4px 4px 0 0;
    text-align: center;
    }
    #videoReviewMain h3 {
    color: #fff;
    font-size: 1em;
    margin: 0.2em;
    text-transform: uppercase;
    font-weight: 500;
    }
    #videoReviewMain .modal-body {
    padding: 20px 35px;
    font-size: 0.9em;
    }
    #videoReviewMain p {
    color: #344a5f;
    line-height: 1.3em;
    }
    #videoReviewMain form {
    text-align: center;
    margin-top: 35px;
    }
    #videoReviewMain form input[type=text] {
    padding: 12px;
    font-size: 1.2em;
    width: 300px;
    border-radius: 4px;
    border: 1px solid #ccc;
    -webkit-font-smoothing: antialiased;
    }
    #videoReviewMain form input[type=submit] {
    text-transform: uppercase;
    font-weight: bold;
    padding: 12px;
    font-size: 1.1em;
    border-radius: 4px;
    color: #fff;
    background-color: #4ab471;
    border: none;
    cursor: pointer;
    -webkit-font-smoothing: antialiased;
    }
    #videoReviewMain form p {
    text-align: left;
    margin-left: 35px;
    opacity: 0.8;
    margin-top: 1px;
    padding-top: 1px;
    font-size: 0.9em;
    }
    #videoReviewMain .modal-footer {
    position: absolute;
    bottom: 20px;
    text-align: center;
    width: 100%;
    }
    #videoReviewMain .modal-footer p {
    text-transform: capitalize;
    cursor: pointer;
    display: inline;
    border-bottom: 1px solid #344a5f;
    }
    @-webkit-keyframes fadein {
    0% {
    opacity: 0;
    }

    100% {
    opacity: 1;
    }
    }
    @-ms-keyframes fadein {
    0% {
    opacity: 0;
    }

    100% {
    opacity: 1;
    }
    }
    @keyframes fadein {
    0% {
    opacity: 0;
    }

    100% {
    opacity: 1;
    }
    }
    @-webkit-keyframes popin {
    0% {
    -webkit-transform: scale(0);
    transform: scale(0);
    opacity: 0;
    }

    85% {
    -webkit-transform: scale(1.05);
    transform: scale(1.05);
    opacity: 1;
    }

    100% {
    -webkit-transform: scale(1);
    transform: scale(1);
    opacity: 1;
    }
    }
    @-ms-keyframes popin {
    0% {
    -ms-transform: scale(0);
    transform: scale(0);
    opacity: 0;
    }

    85% {
    -ms-transform: scale(1.05);
    transform: scale(1.05);
    opacity: 1;
    }

    100% {
    -ms-transform: scale(1);
    transform: scale(1);
    opacity: 1;
    }
    }
    @keyframes popin {
    0% {
    -webkit-transform: scale(0);
    -ms-transform: scale(0);
    transform: scale(0);
    opacity: 0;
    }

    85% {
    -webkit-transform: scale(1.05);
    -ms-transform: scale(1.05);
    transform: scale(1.05);
    opacity: 1;
    }

    100% {
    -webkit-transform: scale(1);
    -ms-transform: scale(1);
    transform: scale(1);
    opacity: 1;
    }
    }
    .videoReviewWrapper {
    z-index: 999999;
    position: absolute;
    width: 900px;
    top:0;
    bottom:0;
    left:0;
    right:0;
    background:#fff;
    padding:15px;
    height:fit-content;
    height:-webkit-fit-content;
    height:-moz-fit-content;
    margin:auto;
    }
    .videoElemWrapper {
    max-height: 90vh;
    overflow: auto;
    }
    .videoReviewWrapper iframe {
    height: 400px;
    width:100%;
    }
    #videoReviewMain .videoReviewWrapper .videoDesc h3 {
    color: #000;
    font-size: 30px;
    line-height: 1;
    font-weight: 700;
    }

    #videoReviewMain .videoReviewWrapper .videoDesc .reviewBox {
    border: 1px solid #ddd;
    padding: 15px;
    margin-bottom: 15px;
    border-radius: 5px;
    }

    #videoReviewMain .videoReviewWrapper .videoDesc .reviewBox p {
    color: #000;
    font-size: 18px;
    }

    #videoReviewMain .videoReviewWrapper .videoDesc .reviewBox p:not(:last-child){
    margin-bottom: 15px;
    }
    #videoReviewMain span.videoReviewCloseBtn {
    right: 0;
    position: absolute;
    top: 0;
    display: inline-block;
    padding: 10px 20px;
    -webkit-transition: 0.4s;
    -moz-transition: 0.4s;
    -o-transition: 0.4s;
    transition: 0.4s;
    font-size: 16px;
    text-transform: uppercase;
    font-weight: 600;
    background: #fdbb33;
    cursor: pointer;
    z-index: 9999999;
    border-radius: 5px;
    }
    .reviewVideoWrapper {
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    }
    .videoPopUpBox{
    background: #fff;
    cursor: pointer;
    padding: 20px;
    border: 1px solid #eee;
    box-shadow: 0px 0px 10px 0px rgb(0 0 0 / 20%);
    z-index: 0;
    position: relative;
    margin:0 auto;
    width:fit-content;
    width:-webkit-fit-content;
    width:-moz-fit-content;
    }
    .videoPopUpBox .VideoPopBtnWrapper {
    display: flex;
    flex-wrap:wrap;
    font-size:22px;
    font-weight:700;
    justify-content:center;
    }
    .videoPopUpBox .VideoPopBtnWrapper svg {
    width: 50px;
    margin-right: 15px;
    }
    #videoReviewMain {
    font-family: 'Open Sans', sans-serif;
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index:99999999999;
    }
    #videoReviewMain .underlay {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    background-color: rgba(0,0,0,0.5);
    cursor: pointer;
    -webkit-animation: fadein 0.5s;
    animation: fadein 0.5s;
    }
    #videoReviewMain .modal {
    width: 600px;
    height: 400px;
    background-color: #f0f1f2;
    z-index: 1;
    position: absolute;
    margin: auto;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    border-radius: 4px;
    -webkit-animation: popin 0.3s;
    animation: popin 0.3s;
    }
    #videoReviewMain .modal-title {
    font-size: 18px;
    background-color: #252525;
    color: #fff;
    padding: 10px;
    margin: 0;
    border-radius: 4px 4px 0 0;
    text-align: center;
    }
    #videoReviewMain h3 {
    color: #fff;
    font-size: 1em;
    margin: 0.2em;
    text-transform: uppercase;
    font-weight: 500;
    }
    #videoReviewMain .modal-body {
    padding: 20px 35px;
    font-size: 0.9em;
    }
    #videoReviewMain p {
    color: #344a5f;
    line-height: 1.3em;
    }
    #videoReviewMain form {
    text-align: center;
    margin-top: 35px;
    }
    #videoReviewMain form input[type=text] {
    padding: 12px;
    font-size: 1.2em;
    width: 300px;
    border-radius: 4px;
    border: 1px solid #ccc;
    -webkit-font-smoothing: antialiased;
    }
    #videoReviewMain form input[type=submit] {
    text-transform: uppercase;
    font-weight: bold;
    padding: 12px;
    font-size: 1.1em;
    border-radius: 4px;
    color: #fff;
    background-color: #4ab471;
    border: none;
    cursor: pointer;
    -webkit-font-smoothing: antialiased;
    }
    #videoReviewMain form p {
    text-align: left;
    margin-left: 35px;
    opacity: 0.8;
    margin-top: 1px;
    padding-top: 1px;
    font-size: 0.9em;
    }
    #videoReviewMain .modal-footer {
    position: absolute;
    bottom: 20px;
    text-align: center;
    width: 100%;
    }
    #videoReviewMain .modal-footer p {
    text-transform: capitalize;
    cursor: pointer;
    display: inline;
    border-bottom: 1px solid #344a5f;
    }
    @-webkit-keyframes fadein {
    0% {
    opacity: 0;
    }

    100% {
    opacity: 1;
    }
    }
    @-ms-keyframes fadein {
    0% {
    opacity: 0;
    }

    100% {
    opacity: 1;
    }
    }
    @keyframes fadein {
    0% {
    opacity: 0;
    }

    100% {
    opacity: 1;
    }
    }
    @-webkit-keyframes popin {
    0% {
    -webkit-transform: scale(0);
    transform: scale(0);
    opacity: 0;
    }

    85% {
    -webkit-transform: scale(1.05);
    transform: scale(1.05);
    opacity: 1;
    }

    100% {
    -webkit-transform: scale(1);
    transform: scale(1);
    opacity: 1;
    }
    }
    @-ms-keyframes popin {
    0% {
    -ms-transform: scale(0);
    transform: scale(0);
    opacity: 0;
    }

    85% {
    -ms-transform: scale(1.05);
    transform: scale(1.05);
    opacity: 1;
    }

    100% {
    -ms-transform: scale(1);
    transform: scale(1);
    opacity: 1;
    }
    }
    @keyframes popin {
    0% {
    -webkit-transform: scale(0);
    -ms-transform: scale(0);
    transform: scale(0);
    opacity: 0;
    }

    85% {
    -webkit-transform: scale(1.05);
    -ms-transform: scale(1.05);
    transform: scale(1.05);
    opacity: 1;
    }

    100% {
    -webkit-transform: scale(1);
    -ms-transform: scale(1);
    transform: scale(1);
    opacity: 1;
    }
    }
    .videoReviewWrapper {
    z-index: 999999;
    position: absolute;
    width: 900px;
    top:0;
    bottom:0;
    left:0;
    right:0;
    background:#fff;
    padding:15px;
    height:fit-content;
    height:-webkit-fit-content;
    height:-moz-fit-content;
    margin:auto;
    }
    .videoReviewWrapper iframe {
    height: 400px;
    }
    #videoReviewMain .videoReviewWrapper .videoDesc h3 {
    color: #000;
    font-size: 30px;
    line-height: 1;
    font-weight: 700;
    }

    #videoReviewMain .videoReviewWrapper .videoDesc .reviewBox {
    border: 1px solid #ddd;
    padding: 15px;
    margin-bottom: 15px;
    border-radius: 5px;
    }

    #videoReviewMain .videoReviewWrapper .videoDesc .reviewBox p {
    color: #000;
    font-size: 18px;
    }

    #videoReviewMain .videoReviewWrapper .videoDesc .reviewBox p:not(:last-child){
    margin-bottom: 15px;
    }
    #videoReviewMain span.videpReviewCloseBtn {
    right: 30px;
    position: absolute;
    top: 30px;
    display: inline-block;
    padding: 10px 20px;
    -webkit-transition: 0.4s;
    -moz-transition: 0.4s;
    -o-transition: 0.4s;
    transition: 0.4s;
    font-size: 16px;
    text-transform: uppercase;
    font-weight: 600;
    background: #fdbb33;
    cursor: pointer;
    z-index: 9999999999999;
    border-radius: 5px;
    }
    .reviewVideoWrapper {
    background:
    url(https://i.ytimg.com/vi/Y7h4UzOisFY/sd2.jpg?sqp=-oaymwEoCIAFEOAD8quKqQMcGADwAQH4AeYCgALgA4oCDAgAEAEYZyBnKGcwDw==&rs=AOn4CLDcVX9tgSbSCY2OOmPu591SvJ5B7Q);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    }
    @media screen and (max-width:991px){
    .videoReviewWrapper {
    width: 500px;
    }
    .videoReviewWrapper iframe {
    height: 300px;
    }
    }
    @media screen and (max-width:768px){
    .videoPopUpBox .VideoPopBtnWrapper{
    text-align:center;
    justify-content:center;
    }
    .videoPopUpBox .VideoPopBtnWrapper svg {
    margin-top:10px;
    margin-bottom: 15px;
    }
    }
    @media screen and (max-width:576px){
    .video_popup_mobile{
    width: 90%;
    margin: 0 auto;
    }
    }
    @media screen and (max-width:500px){
    .videoPopUpBox .VideoPopBtnWrapper {
    font-size: 16px;
    justify-content: center;
    text-align: center;
    }
    .videoReviewWrapper {
    width: 80%;
    }
    .videoReviewWrapper iframe {
    height: 200px;
    }
    }
@endpush

{{-- Modal Button --}}
<div class="{{ $classes ?? 'mtpx-50' }}">
    <div class="container video_popup_mobile">
        <div class="videoPopUpBox">
            <p class="VideoPopBtnWrapper">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                    viewBox="0 0 252.3 177.3" style="enable-background:new 0 0 252.3 177.3;" xml:space="preserve">
                    <style type="text/css">
                        .st0 {
                            fill: #FFFFFF;
                        }
                    </style>
                    <g>
                        <path fill="red"
                            d="M249.9,50.9c0,23.2,0,46.4,0,69.6c-0.2,1-0.4,2-0.5,3.1c-0.6,8.1-1.7,16.2-4.4,23.9c-3.6,10.1-10.1,17.6-20,22   c-8.2,3.7-16.9,5.1-25.8,5.6c-8.9,0.5-17.9,0.6-26.8,0.6c-36.6,0-73.2,0.1-109.7-0.1c-11.1-0.1-22.2-1.5-32.6-5.7   c-8.6-3.5-15.5-9-20-17.3c-4.8-8.9-6.8-18.6-7-28.6c-0.5-20.2-0.5-40.4-0.5-60.6c0-8,0.4-15.9,1-23.9C3.9,32.9,5.5,26.7,8.7,21   c5.3-9.2,14-13.5,23.7-16c10.4-2.7,21.1-3.4,31.9-3.4c39.8-0.1,79.6,0,119.4-0.1c11.5,0,23,0.5,34.3,3c7.1,1.6,13.9,4.1,19.4,9.2   c7,6.4,9.7,14.8,11,23.8C249.1,42,249.4,46.5,249.9,50.9z M97.6,87.5c0,8.6,0,17.2,0,25.8c0,7.8,5.9,11.3,12.8,7.8   c16.6-8.6,33.1-17.3,49.6-25.9c3.1-1.6,5.4-3.9,5.4-7.6c0-3.8-2.2-6.2-5.4-7.8c-16.5-8.5-33-17.1-49.5-25.7   c-7-3.6-12.9-0.1-12.9,7.8C97.6,70.4,97.6,78.9,97.6,87.5z" />
                        <path class="st0"
                            d="M97.6,87.5c0-8.5,0-17.1,0-25.6c0-7.9,5.9-11.4,12.9-7.8c16.5,8.5,33,17.1,49.5,25.7c3.3,1.7,5.5,4,5.4,7.8   c0,3.7-2.3,6-5.4,7.6c-16.6,8.6-33.1,17.3-49.6,25.9c-6.9,3.6-12.8,0-12.8-7.8C97.6,104.7,97.6,96.1,97.6,87.5z" />
                    </g>
                </svg>
                Must watch before you Enroll OSHA training with us!
            </p>
            <script type="application/ld+json">
                {
                    "@context": "https://schema.org",
                    "@type": "VideoObject",
                    "name": "{{ $reviewDetails->name }}",
                    "description": "{{ strip_tags($reviewDetails->msg) }}",
                    "thumbnailUrl": [
                        "https://img.youtube.com/vi/{{ $reviewDetails->code }}/hqdefault.jpg"
                    ],
                    "uploadDate": "{{ $reviewDetails->upload_date }}",
                    "duration": "{{ $reviewDetails->duration }}",
                    "contentUrl": "https://www.youtube.com/watch?v={{$reviewDetails->code}}&ab_channel=OshaOutreachCourses",
                    "embedUrl": "https://www.youtube.com/embed/{{$reviewDetails->code}}",
                    "interactionStatistic": {
                        "@type": "InteractionCounter",
                        "interactionType": {
                            "@type": "http://schema.org/WatchAction"
                        },
                        "userInteractionCount": 5647018
                     },
                    "regionsAllowed": "US,NL"
                }
            </script>
        </div>
    </div>
</div>

{{-- Modal Button --}}

{{-- Modal Content --}}
@push('modal_content')
    <div id="videoReviewMain">

        <div class="underlay"></div>
        <div class="videoReviewWrapper">
            <span class="videoReviewCloseBtn">
                ✖️
            </span>
            <div class="videoElemWrapper">
                <div class="">
                    <iframe
                        src="https://www.youtube.com/embed/{{ $reviewDetails['code'] }}?cc_load_policy=1&modestbranding=1&color=white&iv_load_policy=3"
                        srcdoc="
                                    <style>
                                        *{padding:0;margin:0;overflow:hidden}
                                        html,body{height:100%}
                                        img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}
                                        span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}
                                        video{width:100%;}
                                    </style>
                                    <a href=https://www.youtube.com/embed/{{ $reviewDetails['code'] }}?autoplay=1&cc_load_policy=1&modestbranding=1&color=white&iv_load_policy=3>
                                        <img src=https://img.youtube.com/vi/{{ $reviewDetails['code'] }}/hqdefault.jpg alt='OSHA OUTREACH VIDEO REVIEWS'>
                                        <span>▶</span>
                                    </a>"
                        frameborder="0" allowfullscreen title="OSHA OUTREACH VIDEO REVIEWS"></iframe>
                </div>
                <div class="videoDesc">
                    <div class="reviewBox">
                        <p>
                            <b> Here's what {{ $reviewDetails['name'] }} had to say about oshaoutreachcourses.com in
                                addition to their video
                                testimonial:</b>
                        </p>
                        <p>
                            "{{ $reviewDetails['msg'] }}"
                        </p>
                        <p>
                            {{ $reviewDetails['name'] }} also gave oshaoutreachcourses.com the following ratings:
                        </p>
                        <p>
                            Re buy: {{ $reviewDetails['rebuy_stars'] }}
                        </p>
                        <p>
                            Price: {{ $reviewDetails['price_stars'] }}
                        </p>
                        @if ($reviewDetails['customer_service_stars'] !== '☆☆☆☆☆')
                            <p>
                                Customer Service: {{ $reviewDetails['customer_service_stars'] }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script defer>
        document.addEventListener('DOMContentLoaded', function() {
            $('.videoPopUpBox').on('click', function() {
                $('#videoReviewMain').show();
                $('body').css('overflow', 'hidden');
            });
            $(document).keyup(function(e) {
                if (e.key === "Escape") {
                    $('#videoReviewMain').hide();
                    $('#videoReviewMain iframe').attr('src', '');
                    $('body').css('overflow', 'auto');
                }
            });
            $('.videoReviewCloseBtn, .underlay').on('click', function() {
                $('#videoReviewMain').hide();
                $('#videoReviewMain iframe').attr('src', '');
                $('body').css('overflow', 'auto');
            });
        });
    </script>
@endpush

{{-- Modal Content --}}
