@extends('layouts.master')

@section('title')
    Sign In
@endsection

@section('content')
    <div class="page-heading">
        <h2 class="title mbpx-0">Sign In</h2>
        <p class="subtitle"></p>
    </div>
    <section class="sec-padding cart-form bg-lgrey mtpx-30">
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    @if($login_failed)
                        <p style="color: red;font-size: 14px;" class="ta-center">Email and password combination is not correct, try again.</p><br/><br/>

                    @endif
                    <form action="{{ route('user.signin') }}" method="post">
                        <div class="control-group">
                            <label class="form-label">E-Mail</label>
                            {{ Form::email('email', null, ['class' => $errors->has('email') ? 'form-field error ' : 'form-field', 'autocomplete' => 'off']) }}
                            @if ($errors->has('email'))
                                <p class="error-msg ta-right">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                        <div class="control-group">
                            <label class="form-label">Password</label>
                            {{ Form::password('password', ['class' => $errors->has('password') ? 'form-field error ' : 'form-field']) }}
                            @if ($errors->has('password'))
                                <p class="error-msg ta-right">{{ $errors->first('password') }}</p>
                            @endif
                        </div>
                        <p class="float-left mtpx-30">Don't have an account?<br/><a class="fc-primary" href="{{ route('user.signup') }}">Sign up instead!</a></p>
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
