@if(in_array(Route::currentRouteName(), ['order.details', 'promotions.checkout']))
    <div class="row" id="accepted-payment-methods">
        <div class="col-md-12">
            <strong class="fs-medium mbpx-10 mtpx-10">ACCEPTED PAYMENT MODES</strong>
        </div>
        <div class="col-md-12 ta-center">
            <picture>
                <source srcset="{{ asset('/images/payment-methods.webp') }}" type="image/webp">
                <source srcset="{{ asset('/images/payment-methods.png') }}" type="image/png">
                <img loading="lazy" src="{{ asset('/images/payment-methods.png') }}" alt="Accepted Payment Methods">
            </picture>
        </div>
        <div id="payment-alert" class="offset-md-1 col-md-10 offset-xs-1 col-xs-10 alert alert-danger"
             style="display: none">
            Please Complete the User Details First
        </div>
    </div>
    <div class="row mtpx-30">
        <div class="col-md-12">
            <strong class="fs-medium mbpx-10 mtpx-10">REVIEWS</strong>
        </div>
    </div>
    <div class="checkout-testimonial-slider">
        @foreach(\App\Models\Review::orderBy('id', 'desc')->get() as $review)
            <div class="item-banner">
                <div class="row testimonial">
                    <div class="col-md-12">
                        <div class="testimonial-logo testimonial_{{ $review->logo }}"
                             id="testimonial-{{ $review->id }}"></div>
                        <strong>{{ $review->user }} @ {{ $review->company }}</strong><br>
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $review->rating)
                                <i class="xicon icon-star-full"></i>
                            @else
                                <i class="xicon icon-star-empty"></i>
                            @endif
                        @endfor
                        <br>
                        <p>{{ $review->comment }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <section class="bg-secondary sec-padding">
        <div class="container">
            <div class="page-heading">
                <h2 class="title mbpx-0">Our Reviews</h2>
                <div class="homepage-testimonial-slider">
                    @foreach(\App\Models\Review::orderBy('id', 'desc')->get() as $review)
                        <div class="item-banner">
                            <div class="row testimonial">
                                <div class="col-md-12">
                                    <div class="testimonial-logo testimonial_{{ $review->logo }}"
                                         id="testimonial-{{ $review->id }}"></div>
                                    <h3 class="fs-medium">{{ $review->user }} @ {{ $review->company }}</h3><br>
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $review->rating)
                                            <i class="xicon icon-star-full"></i>
                                        @else
                                            <i class="xicon icon-star-empty"></i>
                                        @endif
                                    @endfor
                                    <br>
                                    <p>{{ $review->comment }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <br><br>
    </section>
@endif
