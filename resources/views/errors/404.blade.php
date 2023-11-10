@extends('layouts.master')

@section('content')
    <?php
    $error_code = '404';
    $error_title = 'Page not found';
    $error_description = 'The requested page could not be found';
    ?>
    @include('errors._template')
@endsection