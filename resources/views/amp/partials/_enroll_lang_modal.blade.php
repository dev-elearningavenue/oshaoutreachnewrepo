<amp-lightbox id={{ $modalId }} layout="nodisplay">
    <div class="modal_box">
        <div class="modal-content">
            <div class="close-btn" on="tap:{{ $modalId }}.close" role="button" tabindex="0">
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
                        <a
                            class="lang-container custom-border"
                            href="/add-to-cart/{{ $course['id'] }}"
                        >
                            <span class="lang {{ $course['class'] }}"></span>
                            <p class="mt-5 fw-bold fs-large">{{ $course['language'] }}</p>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a
                            class="lang-container"
                            href="/add-to-cart/{{ $variants['sku'] }}"
                        >
                            <span class="lang {{ $variants['class'] }}"></span>
                            <p class="mt-5 fw-bold fs-large">{{ $variants['language'] }}</p>
                        </a>
                    </div>
                @else
                    <div class="col-md-6">
                        <a
                            class="lang-container custom-border"
                            href="/add-to-cart/{{ $course->id }}"
                        >
                            <span class="lang lang-{{ strtolower($course->language) === 'english' ? 'en' : 'es' }}"></span>
                            <p class="mt-5 fw-bold fs-large">{{ strtolower($course->language) === 'english' ? 'ENGLISH' : 'ESPAÑOL' }}</p>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a
                            class="lang-container"
                            href="/add-to-cart/{{ $variants[0]['sku'] }}"
                        >
                            <span class="lang lang-{{ strtolower($variants[0]['language']) === 'english' ? 'en' : 'es' }}"></span>
                            <p class="mt-5 fw-bold fs-large">{{ strtolower($variants[0]['language']) === 'english' ? 'ENGLISH' : 'ESPAÑOL' }}</p>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</amp-lightbox>

@once
    @push('component-script')
        <script async custom-element="amp-lightbox" src="https://cdn.ampproject.org/v0/amp-lightbox-0.1.js"></script>
    @endpush

    @push('custom-css')
        .modal_box {
        position: fixed; /* Stay in place */
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
        {{-- For language modal --}}
        .lang {
        width: 30px;
        height: 20px;
        display: inline-block;
        margin: 0px 5px -5px;
        border: 1px solid #000;
        }

        .lang.lang-en {
        background: url('{{ asset('images/flags_sprites.webp') }}') -90px -0;
        }

        .lang.lang-es {
        background: url('{{ asset('images/flags_sprites.webp') }}') -120px -0;
        }

        amp-lightbox {
            z-index: 9999
        }

        .mt-5 {
        margin-top: 5%;
        }
        {{-- For language modal --}}
    @endpush
@endonce
