<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/src/css/ar_style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('/src/css/intlTelInput.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css">
    <title>@yield('title', 'American Recruits | '.env('APP_NAME'))</title>
    @stack('styles')
</head>

<body>
<main>
    <header>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11 col-md-11 col-lg-9 col-xl-7">
                    <div class="row justify-content-between">
                        <div class="col-6 col-sm-4 col-md-4">
                            <div class="logoWrapper">
                                <a href="/">
                                    <img src="{{ asset('/images/osha-outreach-courses.png') }}"
                                         alt="OSHA Outreach Courses Logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-4">
                            <div class="logoWrapper">
                                <img src="{{ asset('/images/american-recruits/american-recruits.svg') }}"
                                     alt="American Recruits Logo">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    </header>
    @yield('content')
    <div id="inlineDatepicker"></div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>
<script type="text/javascript" src="{{ asset('/src/js/intlTelInput.min.js') }}"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.min.js" integrity="sha512-jEc69+XeOdfDwLui+HpPWl8/8+cxkHcwcznwbVGrmVlECJD+L1yN0PljgF2MPs6+1bTX+gNvo/9C3YJ7n4i9qw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
<script type="text/javascript" src="{{ asset('/src/js/utils.js') }}"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="{{ asset('/src/js/ar_main.js') }}"></script>
@stack('scripts')
</body>

</html>
