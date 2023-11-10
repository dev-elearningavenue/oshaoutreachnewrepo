@if(isset($product))
@php
$title = $product->title;
$price = $product->price;
$discounted_price =  $product->discounted_price;
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
.enrollBtn {
position: fixed;
top: 15%;
left: calc(100% + 50px);
cursor: pointer;
border-radius: 10px 0 0 10px;
-webkit-animation: pulse 1s ease infinite;
animation: pulse 1s ease infinite;
box-shadow: 0 0 30px -5px rgb(0 0 0 / 20%);
height: 150px;
width: 350px;
overflow: hidden;
transition: all .5s ease;
background: #fff;
display: flex;
z-index: 9999;
}
.enrollBtn.Show{
left: calc(100% - 50px);
}
.enrollBtn.Show:hover{
-webkit-animation: none;
animation: none;
left: calc(100% - 340px);
}
.enrollBtn>a{
display: flex;
}
.enrollBtn>a:hover{
color:#000;
}
.enrollBtn>a>span{
width: 70px;
display: inline-block;
height: 100%;
}
.enrollBtn .btnText{
background: #fdbb33;
color: #1c1c1c;
padding: 15px;
font-weight: 500;
text-transform: uppercase;
-ms-writing-mode: tb-lr;
writing-mode: vertical-lr;
transform: rotate(180deg);
transition: all .2s ease;
height: 100%;
display: flex;
font-weight:600;
justify-content: center;
align-items: center;
font-size: 18px;
}
.enrollBtn .enrollBtnDesc {
padding: 20px;
display: flex;
flex-direction: column;
justify-content: space-between;
}

.enrollBtn .enrollBtnDesc span.courseTitle {
font-size: 16px;
font-weight: 700;
line-height: 1;
}

.enrollBtn .enrollBtnDesc .enrollBtnPricingWrapper {
display: flex;
align-items: flex-end;
}

.enrollBtn .enrollBtnDesc .enrollBtnPricingWrapper span.enrollBtnSalePrice {
font-size: 30px;
font-weight: 700;
margin-right: 20px;
line-height: 1;
}

.enrollBtn .enrollBtnDesc .enrollBtnPricingWrapper span.enrollBtnActualPrice {
font-size: 20px;
font-weight: 400;
}
@-webkit-keyframes pulse{0%{transform:scaleX(1)}50%{transform:scale3d(1.05,1.05,1.05)}to{transform:scaleX(1)}}@keyframes pulse{0%{transform:scaleX(1)}50%{transform:scale3d(1.05,1.05,1.05)}to{transform:scaleX(1)}}@-webkit-keyframes loading{0%{transform:rotate(0deg)}to{transform:rotate(1turn)}}
@media screen and (max-width:767px){
    .enrollBtn.Show:hover{
        -webkit-animation: none;
        animation: none;
        left: calc(100% - 50px);
    }
}
@endpush
<div class="enrollBtn">
    <a href="{{
            $course->lms === LMS_TYPE_OSHA_OUTREACH ?
                route('product.addToCart', ['id' => $product_id]) :
                "https://oshaoutreachcourses.puresafety.com/Ondemand/ShoppingCart/AddToCart/301-" . $course_content['training_id']
            }}"
    >
        <span title="{{ $title }} ${{ $course->lms === LMS_TYPE_OSHA_OUTREACH ? number_format($discounted_price, 0) : $price }}">
            <span class="btnText">
                Enroll Now
            </span>
        </span>
        <div class="enrollBtnDesc">
            <span class="courseTitle">
                {{ $title }}
            </span>
            <div class="enrollBtnPricingWrapper">
                @if($discounted_price > 0 && $course->lms === LMS_TYPE_OSHA_OUTREACH)
                    <span class="enrollBtnSalePrice">
                        ${{ number_format($discounted_price, 0) }}
                    </span>
                    <span class="enrollBtnActualPrice">
                        <small class="price-lt">${{ number_format($price, 2) }}</small>
                    </span>
                @else
                    <span class="enrollBtnSalePrice">
                        ${{ number_format($price, 2) }}
                    </span>
                @endif
            </div>
        </div>
    </a>
</div>
<!-- <div class="fixed-cta">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="course-name h5">{{ $title }}</h2>
                <div class="enroll-price">
                    @if($course->lms === LMS_TYPE_OSHA_OUTREACH)
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
</div> -->
