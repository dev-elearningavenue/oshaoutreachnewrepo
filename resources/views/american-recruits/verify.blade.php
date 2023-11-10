@extends('american-recruits.ar_master')

@section('title', "American Recruits")

@section('content')
<section class="signupSection">
    <div class="container">
        <div class="signupWrapper">
            <div class="row justify-content-center">
                <div class="col-11 col-md-9 col-lg-7">
                    <div class="thankYouWrapper">
                        <div class="iconWrapper">
                            <img src="/images/american-recruits/check.svg" alt="">
                        </div>
                        <div class="desc">
                            <br />
                            <h3>
                                Hello <span class="name">(Name)</span>,
                            </h3>
                            <p>
                                Congratulations! You have successfully completed your email verification process.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


{{--@push("styles")--}}
{{--@endpush--}}

@push('scripts')

<script>
$('.signupSection').hide();
let urlParam = window.location.search;
let emailToken = urlParam.split("=");
var form = new FormData();
form.append("token", emailToken[1]);

var settings = {
    "url": "{{ env('LMS_API_URL') }}/american-recruits/verify-token",
    "method": "POST",
    "timeout": 0,
    "processData": false,
    "mimeType": "multipart/form-data",
    "contentType": false,
    "data": form
};

$.ajax(settings).done(function(response) {
    const dataResponse = JSON.parse(response);
    if (dataResponse.message === 'Congratulations! you have been verified') {
        $('.signupSection').show();
        $('.name').text(dataResponse.firstName + ' ' + dataResponse.lastName);
        $('.email').text('(' + dataResponse.email + ')');
    } else if (dataResponse.message === 'You are already verified') {
        $('.signupSection').html(
            '<section class="signupSection" style=""><div class="container"><div class="signupWrapper"><div class="row justify-content-center"><div class="col-11 col-md-9 col-lg-7"><div class="thankYouWrapper"><div class="iconWrapper"><img src="/images/american-recruits/check.svg" alt=""></div><div class="desc"><br><h3 style="color:#004191;">You Are Already Verified</h3></div></div></div></div></div></div></section>'
            );
        $('.signupSection').show();
    } else {
        $('.signupSection').html(
            '<section class="signupSection"><div class="container"><div class="signupWrapper"><div class="row justify-content-center"><div class="col-11 col-md-9 col-lg-7"><div class="thankYouWrapper"><div class="desc"><h3 style="color:#004191;">Opps! Some Thing Went Wrong</h3><p>Please try again</p></div></div></div></div></div></div></section>'
            );
        $('.signupSection').show();
    }
});
</script>
@endpush
