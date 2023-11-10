@php
    $priceValidUntil = date('Y-m-d', strtotime('12/31'));
@endphp
@foreach($courses as $course)
    {{--Structured Data--}}
    <script type="application/ld+json">
                {
                    "@context": "https://schema.org",
                    "@type": "Course",
                    "name": "{{ $course->title }}",
                    "description": "{{ strip_tags($course->description) }}",
                    "provider": {
                        "@type": "Organization",
                        "name": "OSHA Outreach Courses",
                        "logo": {
                            "url": "{{ url('/images/osha-outreach-courses.png') }}",
                            "width": 310,
                            "height": 60,
                            "@type": "ImageObject"
                        },
                        "sameAs": "{{ url('/') }}"
                    }
                }


    </script>
    <script type="application/ld+json">
                {
                    "@context": "http://schema.org",
                    "@type": "Product",
                    "name": "{{ $course->title }}",
                    "description": "{{  strip_tags($course->description)  }}",
                    "image": ["{{ asset($course->imagePath.'.jpg') }}"],
                    "sku": "SKU-{{ str_pad($course->id, 4, '0', STR_PAD_LEFT) }}",
                    "offers": {
                        "@type": "Offer",
                        "url": "{{ url()->full() }}",
                        "priceCurrency": "USD",
                        "price": "{{  $course->discounted_price }}",
                        "priceValidUntil": "{{ $priceValidUntil }}",
                        "availability": "https://schema.org/InStock"
                    }
                }


    </script>
    {{--Structured Data--}}
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 mbpx-20">
        <div class="osha-course-box">
            <a href="{{ url($course->slug) }}?outputType=amp">
                <amp-img src="{{ asset($course->plain_image_path.'.jpg') }}" alt="{{ $course->title }}"
                         title="{{ $course->title }}" layout="responsive" width="50" height="55">
                    <h3 style="color:#fff;" class="title">{!! customCourseName($course->slug) !!}</h3>
                </amp-img>
            </a>

            <div class="osha-course-bottom">
                @if($course->discounted_price > 0)
                    <span class="osha-course-price fc-red">
                            ${{ $course->discounted_price }}
                            <small
                                class="fs-medium fc-black price-lt">${{ number_format($course->price, 0) }}</small>
                        </span>
                @else
                    <span class="osha-course-price">${{ $course->price }}</span>
                @endif<br/>
                @if($course->lms === LMS_TYPE_OSHA_OUTREACH)
                    <a href="{{ route('product.addToCart', ['id' => $course->id]) }}"
                       class="btn --btn-primary --btn-small osha-course-purchase-btn enrollBtnText">
                    </a><br>
                @else
                    <a href="https://oshaoutreachcourses.puresafety.com/Ondemand/ShoppingCart/AddToCart/301-{{$course->course_id}}"
                       class="btn --btn-primary --btn-small osha-course-purchase-btn enrollBtnText">
                    </a><br>
                @endif
                <a href="/{{ $course->slug }}?outputType=amp" class="view-course-link">VIEW COURSE</a>
            </div>
        </div>
    </div>
@endforeach
