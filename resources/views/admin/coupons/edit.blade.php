@extends('layouts.admin')

@section('title')
    Update Coupon
@endsection

@section('content')

        <div class="container">
        {!! Form::model($coupon,['route' => ['coupons.update',$coupon->id], 'method' => 'put', 'class' => 'group-enrollment-form']) !!}

                @include('admin.coupons._form',['submitButtonText' => 'Update','readonly'=>''])

            {!! Form::close() !!}
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
