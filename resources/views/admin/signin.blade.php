@extends('layouts.master')

@section('title')
    Sign In
@endsection

@section('content')
    <div class="page-heading">
        <h2 class="title mbpx-0">Sign In</h2>
        <p class="subtitle"></p>
    </div>
    <section class="sec-padding cart-form mtpx-30">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    @if(isset($login_failed))
                        <p style="color: red;font-size: 14px;" class="ta-center">Email and password combination is not correct, try again.</p><br/><br/>
                    @endif
                    @if(isset($user_inactive))
                        <p style="color: red;font-size: 14px;" class="ta-center">User is inactive</p><br/><br/>
                    @endif
                    <form action="{{ route('admin.signin') }}" method="post">
                        <div class="control-group focused">
                            <label class="form-label">E-Mail</label>
                            {{ Form::email('email', null, ['class' => $errors->has('email') ? 'form-field error ' : 'form-field', 'autocomplete' => 'off', 'required' => 'required']) }}
                            @if ($errors->has('email'))
                                <p class="error-msg ta-right">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                        <div class="control-group focused">
                            <label class="form-label">Password</label>
                            {{ Form::password('password', ['class' => $errors->has('password') ? 'form-field error ' : 'form-field', 'required' => 'required']) }}
                            @if ($errors->has('password'))
                                <p class="error-msg ta-right">{{ $errors->first('password') }}</p>
                            @endif
                        </div>
                        <div class="float-right">
                            <input type="submit" class="btn --btn-primary mtpx-30 mbpx-20" value="Sign In">
                        </div>
                        {{ csrf_field() }}
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
