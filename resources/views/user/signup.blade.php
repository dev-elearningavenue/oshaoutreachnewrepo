@inject('arrays','App\Http\Utilities\Arrays')
@extends('layouts.master')

@section('title')
    Sign Up
@endsection

@section('content')
    <div class="page-heading">
        <h2 class="title mbpx-0">Sign Up</h2>
        <p class="subtitle"></p>
    </div>

    <section class="sec-padding cart-form bg-lgrey mtpx-30">
        <div class="container">

            {!! Form::open(['route' => 'user.signup', 'method' => 'post']) !!}
                <div class="row mtpx-20">
                    <div class="col-md-6">
                        <div class="control-group">
                            <label class="form-label">First Name</label>
                            {{ Form::text('first_name', null, ['class' => $errors->has('first_name') ? 'form-field error ' : 'form-field', 'autocomplete' => 'off']) }}
                            @if ($errors->has('first_name'))
                                <p class="error-msg ta-right">{{ $errors->first('first_name') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="control-group">
                            <label class="form-label">Last Name</label>
                            {{ Form::text('last_name', null, ['class' => $errors->has('last_name') ? 'form-field error ' : 'form-field', 'autocomplete' => 'off']) }}
                            @if ($errors->has('last_name'))
                                <p class="error-msg ta-right">{{ $errors->first('last_name') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row mtpx-20">
                    <div class="col-md-6">
                        <div class="control-group">
                            <label class="form-label">E-Mail</label>
                            {{ Form::email('email', null, ['class' => $errors->has('email') ? 'form-field error ' : 'form-field', 'autocomplete' => 'off']) }}
                            @if ($errors->has('email'))
                                <p class="error-msg ta-right">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="control-group">
                            <label class="form-label">Contact #</label>
                            {{ Form::text('contact_no', null, ['class' => $errors->has('contact_no') ? 'form-field error ' : 'form-field', 'autocomplete' => 'off']) }}
                            @if ($errors->has('contact_no'))
                                <p class="error-msg ta-right">{{ $errors->first('contact_no') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row mtpx-20">
                    <div class="col-md-6">
                        <div class="control-group">
                            <label class="form-label">Password</label>
                            {{ Form::password('password', ['class' => $errors->has('password') ? 'form-field error ' : 'form-field']) }}
                            @if ($errors->has('password'))
                                <p class="error-msg ta-right">{{ $errors->first('password') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="control-group">
                            <label class="form-label">Confirm Password</label>
                            {{ Form::password('password_confirmation', ['class' => $errors->has('password_confirmation') ? 'form-field error ' : 'form-field']) }}
                            @if ($errors->has('password_confirmation'))
                                <p class="error-msg ta-right">{{ $errors->first('password_confirmation') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row mtpx-20">
                    <div class="col-md-12">
                        <div class="control-group">
                            <label class="form-label">Street Address</label>
                            {{ Form::text('address', null, ['class' => $errors->has('address') ? 'form-field error ' : 'form-field']) }}
                            @if ($errors->has('address'))
                                <p class="error-msg ta-right">{{ $errors->first('address') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row mtpx-20">
                    <div class="col-md-6">
                        <div class="control-group">
                            <label class="form-label">ZIP/Postal Code</label>
                            {{ Form::text('zip_code', null, ['class' => $errors->has('zip_code') ? 'form-field error ' : 'form-field']) }}
                            @if ($errors->has('zip_code'))
                                <p class="error-msg ta-right">{{ $errors->first('zip_code') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="control-group">
                            <label class="form-label">City</label>
                            {{ Form::text('city', null, ['class' => $errors->has('city') ? 'form-field error ' : 'form-field']) }}
                            @if ($errors->has('city'))
                                <p class="error-msg ta-right">{{ $errors->first('city') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row mtpx-20">
                    <div class="col-md-6">
                        <div class="control-group">
                            <label class="form-label">State/Province</label>
                            {{ Form::select('state_select', $arrays::states(), 'AL', ['class' => $errors->has('state') ? 'form-field error ' : 'form-field', 'id' => 'state_select']) }}
                            @if ($errors->has('state'))
                                <p class="error-msg ta-right">{{ $errors->first('state') }}</p>
                            @endif
                            {{ Form::text('state', null, ['class' => 'form-field', 'id' => 'state']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="control-group">
                            <label class="form-label">Country</label>
                            {{ Form::select('country', $arrays::countries(), 'US', ['class' => $errors->has('country') ? 'form-field error ' : 'form-field', 'id' => 'country']) }}
                            @if ($errors->has('country'))
                                <p class="error-msg ta-right">{{ $errors->first('country') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 ta-right mtpx-30">
                        <input type="submit" class="btn --btn-primary" value="Sign Up">
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function (){

            check_state();
            check_country();

            $('#state_select').change(function(){
                check_state();
            });
            $('#country').change(function(){
                $("#state").val('');
                check_country();
            });

            function check_state() {
                $('#state').val($('#state_select').val())
            }

            function check_country() {
                if($('#country').val() == 'US'){
                    // Hide State Text Field
                    $('#state').hide();
                    // Show State Dropdown
                    $('#state_select').show();
                    $('#state_select').parent().addClass('focused');
                } else {
                    // Hide State Dropdown
                    $('#state_select').hide();
                    // Show State Text Field
                    $('#state').show();
                }
            }
        });
    </script>
@endsection