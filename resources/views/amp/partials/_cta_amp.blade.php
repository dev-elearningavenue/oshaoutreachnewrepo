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
    .fixed-cta {
        padding: 10px 0 10px;
        background-color: #2e2f30;
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 13px 0;
        z-index: 99;
        border-top: 1px solid #999;
        color: #ffffff;
    }

    .fc-red {
        color: #ff0000;
    }

    .cta-price small {
        font-size: 13px;
    }

    .fixed-cta .cta-price, .\--courses-box .cta-price {
        display: inline-block;
        background-color: #ffb900;
        color: #000000;
        padding: 5px;
        text-align: center;
        font-size: 18px;
        font-weight: bold;
    }

    .fixed-cta .enroll_now_btn, .\--courses-box .enroll_now_btn {
        display: inline-block;
        font-size: 18px;
        font-weight: bold;
        text-align: center;
        padding: 5px 15px;
    }

    .float-left {
        float: left;
    }

    .fixed-cta .course-name {
        display: block;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
        font-size: 18px;
        margin-top: 2px;
        padding: 5px 0 5px 5px;
    }

    .fixed-cta .enroll-price, .\--courses-box .enroll-price{
        width: 220px;
    }

    .cta-price small {
    font-size: 13px;
    }

    #cta-price-lt:before {
    background-color: black;
    }
@endpush
<div class="fixed-cta">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="course-name h5">{{ $title }}</h2>
                <div class="enroll-price">
                    @if($product->lms === LMS_TYPE_OSHA_OUTREACH)
                        <a href="{{ route('product.addToCart', ['id' => $product_id]) }}"
                           class="btn enroll_now_btn float-left --btn-primary mbpx-20">ENROLL NOW</a>
                    @else
                        <a href="https://oshaoutreachcourses.puresafety.com/Ondemand/ShoppingCart/AddToCart/301-{{$course_content['training_id']}}"
                           class="btn enroll_now_btn float-left --btn-primary mbpx-20">ENROLL NOW</a>
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
