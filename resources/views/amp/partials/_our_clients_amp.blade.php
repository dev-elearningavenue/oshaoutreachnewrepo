{{--@push('component-script')--}}
{{--    <script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.2.js"></script>--}}
{{--@endpush--}}

<section class="sec-padding-custom">
    <div class="ta-center">
        <div class="page-heading">
            <h2 class="title">Satisfied Customers</h2>
            <amp-carousel height="110" width="300" layout="responsive" type="slides" role="region" loop autoplay
                          delay="2000"
                          aria-label="Our Clients Carousel">
                <div class="item-banner">
                    <div class="row client">
                        <div class="col-md-12">
                            <div class="clients-logo client-logo-1"></div>
                        </div>
                    </div>
                </div>

                <div class="item-banner">
                    <div class="row client">
                        <div class="col-md-12">
                            <div class="clients-logo client-logo-2"></div>
                        </div>
                    </div>
                </div>

                <div class="item-banner">
                    <div class="row client">
                        <div class="col-md-12">
                            <div class="clients-logo client-logo-3"></div>
                        </div>
                    </div>
                </div>

                <div class="item-banner">
                    <div class="row client">
                        <div class="col-md-12">
                            <div class="clients-logo client-logo-4"></div>
                        </div>
                    </div>
                </div>

                <div class="item-banner">
                    <div class="row client">
                        <div class="col-md-12">
                            <div class="clients-logo client-logo-5"></div>
                        </div>
                    </div>
                </div>

                <div class="item-banner">
                    <div class="row client">
                        <div class="col-md-12">
                            <div class="clients-logo client-logo-6"></div>
                        </div>
                    </div>
                </div>

                <div class="item-banner">
                    <div class="row client">
                        <div class="col-md-12">
                            <div class="clients-logo client-logo-7"></div>
                        </div>
                    </div>
                </div>

                <div class="item-banner">
                    <div class="row client">
                        <div class="col-md-12">
                            <div class="clients-logo client-logo-8"></div>
                        </div>
                    </div>
                </div>

                <div class="item-banner">
                    <div class="row client">
                        <div class="col-md-12">
                            <div class="clients-logo client-logo-9"></div>
                        </div>
                    </div>
                </div>

                <div class="item-banner">
                    <div class="row client">
                        <div class="col-md-12">
                            <div class="clients-logo client-logo-10"></div>
                        </div>
                    </div>
                </div>

                <div class="item-banner">
                    <div class="row client">
                        <div class="col-md-12">
                            <div class="clients-logo client-logo-11"></div>
                        </div>
                    </div>
                </div>

                <div class="item-banner">
                    <div class="row client">
                        <div class="col-md-12">
                            <div class="clients-logo client-logo-12"></div>
                        </div>
                    </div>
                </div>
            </amp-carousel>
        </div>
    </div>
    <br><br>
</section>
@push('custom-css')
    .sec-padding-custom {
    padding-top: 30px;
    }

    .page-heading .title {
    font-weight: 700;
    font-size: 22px;
    text-align: center;
    margin-bottom: 30px;
    line-height: 1.2;
    }

    .clients-logo {
        width: 200px;
        height: 100px;
        margin: 0 auto;
    }

    .client-logo-1 {
        background: url('/images/clients_sprites.webp') -0 -0;
    }

    .client-logo-2 {
        background: url('/images/clients_sprites.webp') -0 -100px;
    }

    .client-logo-3 {
        background: url('/images/clients_sprites.webp') -200px -0;
    }

    .client-logo-4 {
        background: url('/images/clients_sprites.webp') -200px -100px;
    }

    .client-logo-5 {
        background: url('/images/clients_sprites.webp') -0 -200px;
    }

    .client-logo-6 {
        background: url('/images/clients_sprites.webp') -200px -200px;
    }

    .client-logo-7 {
        background: url('/images/clients_sprites.webp') -400px -100px;
    }

    .client-logo-8 {
        background: url('/images/clients_sprites.webp') -400px -0;
    }

    .client-logo-9 {
        background: url('/images/clients_sprites.webp') -0 -300px;
    }

    .client-logo-10 {
        background: url('/images/clients_sprites.webp') -400px -300px;
    }

    .client-logo-11 {
        background: url('/images/clients_sprites.webp') -400px -200px;
    }

    .client-logo-12 {
        background: url('/images/clients_sprites.webp') -200px -300px;
    }
@endpush
