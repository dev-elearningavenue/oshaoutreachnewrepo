@push('component-script')
    <script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.2.js"></script>
@endpush

<section class="bg-secondary" style="padding-top: 20px;">
    <h2 class="our-reviews">Our Reviews</h2>
    <amp-carousel height="275" width="300" layout="responsive" type="slides" role="region" loop controls autoplay
                  delay="2000"
                  aria-label="Reviews Carousel">
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
    </amp-carousel>
    <br><br>
</section>

@push('custom-css')
    .our-reviews {
        font-size: 26px;
        font-weight: 600;
        text-align: center;
        line-height: 1.2;
    }

    .row.testimonial {
        max-width: 600px;
        margin: 20px auto;
        text-align: center;
        font-size: 1.2em;

    }

    .row.testimonial .xicon{
        color: #fdba33;
        font-size: 24px;
    }

    .testimonial-logo{
        width: 100px;
        height: 100px;
        border: 1px solid #1f1d1e;
        border-radius: 50px;
        margin: 2px auto;
    }

    .testimonial_act-logo {
    background: url('/images/testimonials_sprites.webp') -0 -0;
    }
    .testimonial_ficket-logo {
    background: url('/images/testimonials_sprites.webp') -100px -0;
    }
    .testimonial_farrell-co-logo {
    background: url('/images/testimonials_sprites.webp') -200px -0;
    }
    .testimonial_southport-logo {
    background: url('/images/testimonials_sprites.webp') -300px -0;
    }
    .testimonial_cippco-incorporated-logo {
    background: url('/images/testimonials_sprites.webp') -400px -0;
    }
    .testimonial_streimer-logo {
    background: url('/images/testimonials_sprites.webp') -500px -0;
    }
    .testimonial_rbadesign-logo {
    background: url('/images/testimonials_sprites.webp') -600px -0;
    }
    .testimonial_whitecg-logo {
    background: url('/images/testimonials_sprites.webp') -700px -0;
    }
@endpush
