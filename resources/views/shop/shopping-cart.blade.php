@extends('layouts.master')

@section('title', isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Order Details | '.config('app.name') )

@section('styles')
    @if(isset($page['seo_tags']))
        @foreach($page['seo_tags'] as $meta_name => $meta_content)
            <meta name="{{ $meta_name }}" content="{{ $meta_content }}" />
        @endforeach
    @endif
@endsection

@section('content')
    <div class="page-heading">
        <h1 class="title mbpx-0">Cart</h1>
        <p class="subtitle"></p>
    </div>

    <section class="sec-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6 offset-md-3 offset-sm-3 ta-center">
                    <h4>No Items in Cart!</h4>
                    @if(!empty($cart->coupon))
                    <p>Please add course to avail discount.</p>
                    @endif
                </div>
            </div>
        </div>
        </section>
    <style>
        .padding-5{
            padding: 2px 7px !important;
        }
         input[type=button].btn.--btn-primary{
             border: 2px solid #005384 ;
             padding: 8px 40px;
             font-size: 16px;
         }
    </style>
@endsection
