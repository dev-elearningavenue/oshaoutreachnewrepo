@extends('layouts.admin')

@section('title')
    Add Coupon
@endsection

@section('content')
    <div class="row">
        <div class="offset-md-2 col-md-6">
            <h3>Add a Coupon</h3>
        </div>
        <div class="col-md-2">
            <a href="{{ route('coupons.index')}}"  class="btn --btn-primary --btn-small float-right mbpx-10">Back</a>
        </div>
    </div>
    <div class="row mtpx-20">
        <div class="offset-md-2 col-md-8">
            {!! Form::open(['route' => 'coupons.store', 'method' => 'post', 'class' => 'group-enrollment-form']) !!}

            @include('admin.coupons._form',['submitButtonText' => 'Add','readonly'=>''])

            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('input[name="code"]').keyup(function(){
                $(this).val($(this).val().toUpperCase());
            });
        })
    </script>
@endsection
