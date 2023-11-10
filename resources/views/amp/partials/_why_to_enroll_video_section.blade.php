@php
    // Get random video review everytime
    $reviewDetails = \App\Models\VideoReview::query()->inRandomOrder()->first();
@endphp
<div class="mtpx-15 mbpx-20">
    <div class="container">
        <div class="videoPopUpBox" on="tap:video_review_modal" tabindex="0" role="button">
            <h4>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                     viewBox="0 0 252.3 177.3" style="enable-background:new 0 0 252.3 177.3;" xml:space="preserve">
                    <g>
                        <path fill="red"
                              d="M249.9,50.9c0,23.2,0,46.4,0,69.6c-0.2,1-0.4,2-0.5,3.1c-0.6,8.1-1.7,16.2-4.4,23.9c-3.6,10.1-10.1,17.6-20,22   c-8.2,3.7-16.9,5.1-25.8,5.6c-8.9,0.5-17.9,0.6-26.8,0.6c-36.6,0-73.2,0.1-109.7-0.1c-11.1-0.1-22.2-1.5-32.6-5.7   c-8.6-3.5-15.5-9-20-17.3c-4.8-8.9-6.8-18.6-7-28.6c-0.5-20.2-0.5-40.4-0.5-60.6c0-8,0.4-15.9,1-23.9C3.9,32.9,5.5,26.7,8.7,21   c5.3-9.2,14-13.5,23.7-16c10.4-2.7,21.1-3.4,31.9-3.4c39.8-0.1,79.6,0,119.4-0.1c11.5,0,23,0.5,34.3,3c7.1,1.6,13.9,4.1,19.4,9.2   c7,6.4,9.7,14.8,11,23.8C249.1,42,249.4,46.5,249.9,50.9z M97.6,87.5c0,8.6,0,17.2,0,25.8c0,7.8,5.9,11.3,12.8,7.8   c16.6-8.6,33.1-17.3,49.6-25.9c3.1-1.6,5.4-3.9,5.4-7.6c0-3.8-2.2-6.2-5.4-7.8c-16.5-8.5-33-17.1-49.5-25.7   c-7-3.6-12.9-0.1-12.9,7.8C97.6,70.4,97.6,78.9,97.6,87.5z"/>
                        <path class="st0"
                              d="M97.6,87.5c0-8.5,0-17.1,0-25.6c0-7.9,5.9-11.4,12.9-7.8c16.5,8.5,33,17.1,49.5,25.7c3.3,1.7,5.5,4,5.4,7.8   c0,3.7-2.3,6-5.4,7.6c-16.6,8.6-33.1,17.3-49.6,25.9c-6.9,3.6-12.8,0-12.8-7.8C97.6,104.7,97.6,96.1,97.6,87.5z"/>
                    </g>
                    </svg>
                Must watch before you Enroll OSHA training with us!
            </h4>
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


<amp-lightbox id="video_review_modal" layout="nodisplay">
    <div class="modal_box">
        <div class="modal-content">
            <div class="close-btn" on="tap:video_review_modal.close" role="button" tabindex="0">
            <span class="close">
                <i class="icon-close-solid"></i>
            </span>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <amp-youtube width="480" height="270" layout="responsive"
                                 data-videoid="{{ $reviewDetails['code'] }}">
                    </amp-youtube>
                </div>

                <div class="col-md-12">
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
                    @if($reviewDetails['customer_service_stars'] !== "☆☆☆☆☆")
                        <p>
                            Customer Service: {{ $reviewDetails['customer_service_stars'] }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</amp-lightbox>

@once
    @push('component-script')
        <script async custom-element="amp-lightbox" src="https://cdn.ampproject.org/v0/amp-lightbox-0.1.js"></script>

        <script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>
    @endpush

    @push('custom-css')
        .modal_box {
        position: fixed; /* Stay in place */
        padding-top: 0; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0, 0, 0); /* Fallback color */
        background-color: rgba(0, 0, 0, 0.7); /* Black w/ opacity */
        display: flex;
        }

        /* Modal Content */
        .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        position: relative;
        top: 0%;
        bottom: 0%;
        max-width: 800px;
        }
        .modal-content>.row {
        margin: 0;
        }

        .modal-content>.row>.col-md-6 {
        padding: 0;
        }
        /* The Close Button */
        .close {
        color: #aaaaaa;
        float: right;
        font-size: 15px;
        font-weight: bold;
        }

        .close:hover,
        .close:focus {
        color: red;
        text-decoration: none;
        cursor: pointer;
        }

        .lang-container {
        height: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        }

        .lang-container:hover {
        background-color: #1d81c2;
        color: white;
        }

        .custom-border {
        border-right: 1px solid #dcdcdc;
        }
        .modal_box p {
        margin-bottom: 10px;
        }
        .modal_box p b{
        margin-top: 10px;
        line-height: 1.5;
        display: block
        }

        .close-btn {
        position: absolute;
        right: 4px;
        top: 4px;
        }
        {{-- For modal --}}
        .st0 {
        fill: #FFFFFF;
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

        .videoPopUpBox h4 {
        display: flex;
        flex-wrap:wrap;
        font-size:16px;
        justify-content:center;
        text-align: center;

        }
        .videoPopUpBox h4 svg {
        width: 50px;
        margin-right: 15px;
        margin-bottom: 10px
        }
        {{-- For modal --}}
    @endpush
@endonce
