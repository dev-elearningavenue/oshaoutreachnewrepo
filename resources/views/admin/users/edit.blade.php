@inject('arrays','App\Http\Utilities\Arrays')
@extends('layouts.admin')

@section('title')
    All Users
@endsection

@section('content')
    <section class="sec-padding cart-form mtpx-30">
        <div class="container">
            <div class="col-md-8">

                {!! Form::open(['route' => ['admin.users.update', $user->id], 'method' => 'post', 'id' => 'user_edit_form']) !!}
                <div class="user-details">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="title mbpx-20 d-inline-block">User Edit Details</h3>
                        </div>
                    </div>
                    <div class="row mtpx-20">
                        <div class="col-md-6">
                            <div class="control-group focused">
                                <label class="form-label">First Name</label>
                                {{ Form::text('first_name', old('first_name', $edit_user_fields['first_name'] ?? $user->first_name), ['id' => 'first_name', 'class' => $errors->has('first_name') ? 'form-field error ' : 'form-field', 'autocomplete' => 'off', 'required' => 'required']) }}
                                @if ($errors->has('first_name'))
                                    <p class="error-msg ta-right">{{ $errors->first('first_name') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="control-group focused">
                                <label class="form-label">Last Name</label>
                                {{ Form::text('last_name', old('last_name', $edit_user_fields['last_name'] ?? $user->last_name), ['id' => 'last_name', 'class' => $errors->has('last_name') ? 'form-field error ' : 'form-field', 'autocomplete' => 'off', 'required' => 'required']) }}
                                @if ($errors->has('last_name'))
                                    <p class="error-msg ta-right">{{ $errors->first('last_name') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row mtpx-20">
                        <div class="col-md-12">
                            <div class="control-group focused">
                                <label class="form-label">E-Mail</label>
                                {{ Form::email('email', old('email', $edit_user_fields['email'] ?? $user->email), ['id'=>'email', 'class' => $errors->has('email') ? 'form-field error ' : 'form-field', 'autocomplete' => 'off', 'required' => 'required']) }}
                                @if ($errors->has('email'))
                                    <p class="error-msg ta-right">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row mtpx-20">
                        <div class="col-md-6">
                            <div class="control-group focused">
                                <label class="form-label">Status</label>
                                {{ Form::select('status', [0 => 'Inactive', 1 => 'Active'], $edit_user_fields['status'] ?? $user->status , ['id' => 'status', 'class' => $errors->has('status') ? 'form-field error ' : 'form-field', 'id' => 'status', 'required' => 'required']) }}
                                @if ($errors->has('status'))
                                    <p class="error-msg ta-right">{{ $errors->first('status') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="control-group focused">
                                <label class="form-label">Role</label>
                                {{ Form::select('type', $arrays::roles(), $edit_user_fields['type'] ?? $user->type , ['id' => 'type', 'class' => $errors->has('type') ? 'form-field error ' : 'form-field', 'id' => 'type', 'required' => 'required']) }}
                                @if ($errors->has('type'))
                                    <p class="error-msg ta-right">{{ $errors->first('type') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row mtpx-20">
                        <div class="col-md-6">
                            <div class="control-group focused">
                                <label class="form-label">Password</label>
                                {{ Form::password('password', ['id'=>'password', 'class' => $errors->has('password') ? 'form-field error ' : 'form-field', 'maxlength' => 10]) }}
                                @if ($errors->has('password'))
                                    <p class="error-msg ta-right">{{ $errors->first('password') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="control-group focused">
                                <label class="form-label">Confirm Password</label>
                                {{ Form::password('password_confirmation', ['id'=>'password_confirmation','class' => $errors->has('password_confirmation') ? 'form-field error ' : 'form-field', 'maxlength' => 10]) }}
                                @if ($errors->has('password_confirmation'))
                                    <p class="error-msg ta-right">{{ $errors->first('password_confirmation') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
{{--                    <div class="row mtpx-20">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <div class="control-group focused">--}}
{{--                                <label class="form-label">Street Address</label>--}}
{{--                                {{ Form::text('address', old('address', isset($form_fields['address']) ? $form_fields['address'] : ''), ['id' => 'address', 'class' => $errors->has('address') ? 'form-field error ' : 'form-field', 'required' => 'required']) }}--}}
{{--                                @if ($errors->has('address'))--}}
{{--                                    <p class="error-msg ta-right">{{ $errors->first('address') }}</p>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row mtpx-20">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="control-group focused">--}}
{{--                                <label class="form-label">ZIP/Postal Code</label>--}}
{{--                                {{ Form::text('zip_code', old('zip_code', isset($form_fields['zip_code']) ? $form_fields['zip_code'] : ''), ['id' => 'zip_code', 'class' => $errors->has('zip_code') ? 'form-field error ' : 'form-field', 'required' => 'required']) }}--}}
{{--                                @if ($errors->has('zip_code'))--}}
{{--                                    <p class="error-msg ta-right">{{ $errors->first('zip_code') }}</p>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="control-group focused">--}}
{{--                                <label class="form-label">City</label>--}}
{{--                                {{ Form::text('city', old('city', isset($form_fields['city']) ? $form_fields['city'] : ''), ['id' => 'city', 'class' => $errors->has('city') ? 'form-field error ' : 'form-field', 'required' => 'required']) }}--}}
{{--                                @if ($errors->has('city'))--}}
{{--                                    <p class="error-msg ta-right">{{ $errors->first('city') }}</p>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row mtpx-20">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="control-group focused">--}}
{{--                                <label class="form-label">State/Province</label>--}}
{{--                                {{ Form::text('state', null, ['id' => 'state', 'class' => $errors->has('state') ? 'form-field error ' : 'form-field', 'id' => 'state', 'required' => 'required', 'minlength' => '3', 'autocomplete' => 'off']) }}--}}
{{--                                @if ($errors->has('state'))--}}
{{--                                    <p class="error-msg ta-right">{{ $errors->first('state') }}</p>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="control-group focused">--}}
{{--                                <label class="form-label">Country</label>--}}
{{--                                {{ Form::select('country', $arrays::countries(), 'US', ['id' => 'country', 'class' => $errors->has('country') ? 'form-field error ' : 'form-field', 'id' => 'country']) }}--}}
{{--                                @if ($errors->has('country'))--}}
{{--                                    <p class="error-msg ta-right">{{ $errors->first('country') }}</p>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="row mtpx-20">
                        <div class="col-md-6">
                            {{--<div class="control-group focused">
                                <label class="form-label">Is this course for your employee?</label>
                                {{ Form::select('course_for', ['' => 'Select', 0 => 'No', 1 => 'Yes'], old('course_for', $form_fields['course_for']), ['class' => $errors->has('course_for') ? 'form-field error ' : 'form-field', 'id' => 'course_for', 'required' => 'required']) }}
                                @if ($errors->has('course_for'))
                                    <p class="error-msg ta-right">Required</p>
                                @endif
                            </div>--}}
{{--                            <input type="hidden" name="course_for" value="0" />--}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-md-6 text-sm-center">
                            <button type="submit" id="user-submit" class="btn --btn-primary float-md-right mbpx-20 complete_order">Update <i class="xicon icon-arrow-right"></i></button>
                            {{--<input type="button" class="btn --btn-primary float-md-right mbpx-20 submitting_order" value="Submitting Order..." style="display: none;">--}}
                        </div>
                    </div>
{{--                <div class="payment-details" style="display: none;">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-6 text-sm-center push-md-6">--}}
{{--                            <button type="button" class="btn --btn-primary float-md-right mbpx-20 user_details_btn"><i class="xicon icon-arrow-left"></i> User Details</button>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 pull-md-6">--}}
{{--                            <h3 class="title mbpx-20 d-inline-block">Payment Details</h3>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-8 text-sm-center push-md-2">--}}
{{--                            <div class="buy-now" style="display: block;">--}}
{{--                                <div id="paypal-button-container"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}

                {!! Form::close() !!}
            </div>

        </div>

    </section>
    <style>
        form input[type=date] {
            color: #666666;
            padding: 10px 20px;
            height: 44px;
            width: 100%;
            font-size: 14px;
            border: 1px solid #eeeeee;
            background: #ffffff;
            border-radius: 4px;
            position: relative;
            z-index: 4;
        }

        .badge {
            padding: 3px 7px;
            border-radius: 15px;
            font-size: 11px;
            margin-top: 5px;
            display: inline-block;
        }

        .badge-complete {
            background: #005384;
            color: #ffffff;
        }

        .badge-incomplete {
            background: #74787E;
            color: #ffffff;
        }
    </style>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#password, #password_confirmation').change(function(){
                $('#password').val($('#password').val().substring(0,10));
                $('#password_confirmation').val($('#password_confirmation').val().substring(0,10));
            });
            $('#password, #password_confirmation').blur(function(){
                $('#password').val($('#password').val().substring(0,10));
                $('#password_confirmation').val($('#password_confirmation').val().substring(0,10));
            });

            function checkForm() {
                var password1 = document.getElementById('password');
                var password2 = document.getElementById('password_confirmation');

                var re = /(?=.*[a-zA-Z])(?=.*\d).+/;


                if (password1.value.length < 8) {
                    password1.setCustomValidity('Password must contains at least 8 characters.');
                    return false;
                } else if (!re.test(password1.value)){
                    password1.setCustomValidity('Password must contains at least 1 number and 1 letter.');
                    return false;
                }else {
                    password1.setCustomValidity('');

                    if (password1.value === password2.value) {
                        password2.setCustomValidity('');
                    } else {
                        password2.setCustomValidity('Passwords must match');
                        return false;
                    }
                }

                if($('form')[0].checkValidity()) {
                    {{--fbq('track', 'InitiateCheckout', {value: '{{ $total }}',currency: 'USD'});--}}
                        return true;
                }

                return false;
            }

            $('#user-submit').click(function () {
                var passwordField = document.getElementById('password');
                passwordField.setCustomValidity("");
                if(passwordField.value !== "") {
                    if(checkForm()) {
                        $('form')[0].submit();
                    }
                }

            })
        });
    </script>
@endsection

