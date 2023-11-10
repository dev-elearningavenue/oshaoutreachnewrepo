@extends('layouts.master')

@section('title', isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'OSHA 10 and 30 |
'.config('app.name') )

@section('styles')
    @if(isset($page['seo_tags']))
        @foreach($page['seo_tags'] as $meta_name => $meta_content)
            @if($meta_name != 'title')
                <meta name="{{ $meta_name }}" content="{{ $meta_content }}"/>
            @endif
        @endforeach
    @endif
    <meta property="og:title"
          content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'OSHA 10-HOUR TRAINING' }}">
    <meta property="twitter:title"
          content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'OSHA 10-HOUR TRAINING' }}">
    <meta property="og:description"
          content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'OSHA 10-HOUR TRAINING' }}">
    <meta property="twitter:description"
          content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'OSHA 10-HOUR TRAINING' }}">
    <meta property="og:image" content="{{ url('/images/osha-10-30-og/osha-10-hour-online.png') }}">
    <meta property="twitter:image" content="{{ url('/images/osha-10-30-og/osha-10-hour-online.png') }}">
    <!-- Meta Tags for Social Media -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="OSHA Outreach Courses">
    <meta property="fb:app_id" content="817832821974771"/>
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:site" content="@OshaOutreach">

@endsection

@section('content')
    <style>
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            opacity: 0.7;
            background: url('{{asset('/loader.gif')}}') center no-repeat #e9e9e9;
        }
    </style>

@endsection

@section('scripts')
    <script>
        const paymentIntentId = "{{ request('payment_intent') }}"
        const orderId = "{{ request()->route('id') }}"

        $(document).ready(function () {
            $(".loader").show();

            fetch("{{ url(env('LMS_API_URL') . '/shop/orders/') }}" + orderId + '/updatePayment', {
                method: 'PATCH',
                headers: {
                    'content-type': 'application/json',
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Authorization': `Bearer ${getCookie("osha-outreach-token")}`
                },
                body: JSON.stringify({
                    paymentIntentId,
                })
            })
                .then(res => res.json().then(data => ({statusCode: res.status, data})))
                .then(function (response) {
                    console.log(response);
                    if (response.statusCode == 200) {
                        let myDate = new Date();
                        myDate.setDate(myDate.getDate() + 7);

                         /*Set Auth Cookie*/
                        document.cookie = `osha-outreach-token=${response.data.auth_token};expires=${myDate};domain={{ env('COOKIE_DOMAIN') }};path=/`;

                         /*Set Profile Cookie*/
                        document.cookie = `osha-outreach-profile=${JSON.stringify(response.data.profile)};expires=${myDate};domain={{ env('COOKIE_DOMAIN') }};path=/`;

                        window.location.href = `/success?order_id=${orderId}`;
                    } else {
                        window.location.href = response.data.redirect_url ?? "/failure?reason=AJAXFailure";
                    }
                })

        })
    </script>
@endsection
