@if(isset($product))
    @php
        $title = $product->title;
        $price = $product->price;
        $discounted_price = $product->discounted_price;
        $product_id = $product->id;
    @endphp
@else
    @php
        $title = $course_content['title'];
        $price = $course_content['price'];
        $discounted_price = $course_content['discounted_price'];
        $product_id = $course_content['id'];
    @endphp
@endif
@push('custom-css')
    .fixed-cta .enroll-price, .\--courses-box .enroll-price{
    width: 220px;
    }

    #cta-price-lt:before {
    background-color: black;
    }

    @media (max-width: 768px) {
    .fixed-cta {
    padding-bottom: 30px !important;
    }
    }
@endpush
<div class="fixed-cta">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="course-name h5">{{ $title }}</h2>
                <div class="enroll-price">
                    @if($course->lms === LMS_TYPE_OSHA_OUTREACH)
                        <a href="{{ route('product.addToCart', ['id' => $product_id]) }}"
                            class="btn enroll_now_btn float-left --btn-primary mbpx-20 enrollBtnText"></a>
                    @else
                        <a href="https://oshaoutreachcourses.puresafety.com/Ondemand/ShoppingCart/AddToCart/301-{{$course_content['training_id']}}"
                            class="btn enroll_now_btn float-left --btn-primary mbpx-20 enrollBtnText"></a>
                    @endif
                    @if($discounted_price > 0)
                        <span class="cta-price float-left">
                            <strong class="fc-red">${{ number_format($discounted_price, 0) }}</strong>
                            <small class="price-lt" id="cta-price-lt">${{ number_format($price, 0) }}</small>
                        </span>
                    @else
                        <span class="cta-price float-left">${{ number_format($price, 2) }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .cta-price strong{
        /*font-size: 20px;*/
    }
    .cta-price small{
        font-size: 13px;
    }
</style>
