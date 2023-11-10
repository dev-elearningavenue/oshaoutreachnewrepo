{{-- Login Div Section --}}
<div class="loginDiv">
    <h6>Click here to <a href="{{ url('lms') }}" class="btn --btn-small --btn-primary" role="button">Login</a> if you already have an account</h6>
</div>
{{-- Login Div Section --}}

<style>
    {{-- Login Div Styling --}}
    .loginDiv{
        margin-bottom:15px;
        padding-bottom:15px;
        border-bottom:1px solid #ddd;
    }
    .loginDiv h6 {
        font-weight:500;
    }
    .loginDiv h6 a{
        border-radius:15px;
    }
    {{-- Login Div Styling --}}
</style>
