<div id="{{ $modalId }}" class="modal">
    <div class="modal-content">
        <div class="close-btn">
            <span class="close">
                <i class="icon-close-solid"></i>
            </span>
        </div>

            <div class="header">
                <h4 class="mbpx-30 text-center ta-center">SELECT LANGUAGE FOR THE COURSE</h4>
            </div>

        <div class="row">
            @if(isset($staticValues))
                <div class="col-md-6">
                    <div class="lang-container custom-border" onclick="window.location.href = '/add-to-cart/{{ $course['id'] }}'">
                        <span class="lang {{ $course['class'] }}"></span>
                        <p class="mt-2 fw-bold fs-large">{{ $course['language'] }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="lang-container"
                         onclick="window.location.href = '/add-to-cart/{{ $variants['sku'] }}'">
                        <span class="lang {{ $variants['class'] }}"></span>
                        <p class="mt-2 fw-bold fs-large">{{ $variants['language'] }}</p>
                    </div>
                </div>
            @else
                <div class="col-md-6">
                    <div class="lang-container custom-border" onclick="window.location.href = '/add-to-cart/{{ $course->id }}'">
                        <span class="lang lang-{{ strtolower($course->language) === 'english' ? 'en' : 'es' }}"></span>
                        <p class="mt-2 fw-bold fs-large">{{ strtolower($course->language) === 'english' ? 'ENGLISH' : 'ESPAÑOL' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="lang-container"
                         onclick="window.location.href = '/add-to-cart/{{ $variants[0]['sku'] }}'">
                        <span class="lang lang-{{ strtolower($variants[0]['language']) === 'english' ? 'en' : 'es' }}"></span>
                        <p class="mt-2 fw-bold fs-large">{{ strtolower($variants[0]['language']) === 'english' ? 'ENGLISH' : 'ESPAÑOL' }}</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 9999; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0, 0, 0); /* Fallback color */
        background-color: rgba(0, 0, 0, 0.7); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        position: relative;
        top: 20%;
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

    @media (max-width: 767px) {
        .custom-border {
            border-right: none;
            border-bottom: 1px solid #dcdcdc;
        }
    }

    .close-btn {
        position: absolute;
        right: 4px;
        top: 4px;
    }
</style>

<script>
    window.onload = function () {
        modalId = "{{ $modalId }}";

        $('.close, .modal').click(function () {
            $('body').removeClass('modal-open');
            $('.shopperlink').show()

            //Enable Smooth Scroll js
            if(typeof addEvent === 'function') {
                var isChrome = /chrome/i.test(window.navigator.userAgent);
                var isMouseWheelSupported = 'onmousewheel' in document;

                if (isMouseWheelSupported && isChrome) {
                    addEvent("mousedown", mousedown);
                    addEvent("mousewheel", wheel);
                    addEvent("load", init);
                }
            }
            //Enable Smooth Scroll js

            // $('#'+modalId).fadeOut(250);
            $('.modal-content').parent().fadeOut(250);
        });

        // if single modal in page use this function, else define show method in parent with `onclick=methodName('#modalID')`
        $('#enroll_lang_btn').click(function () {
            $('body').addClass('modal-open');
            $('.shopperlink').hide()
            $('#'+modalId).fadeIn(250);
        });

        $('.modal .modal-content').click(function (e) {
            e.stopPropagation();
        });
    }
</script>
