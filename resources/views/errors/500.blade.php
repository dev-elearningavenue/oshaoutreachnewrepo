@extends('layouts.master')

@section('content')
    <?php
    $error_code = '500';
    $error_title = 'Webservice currently unavailable';
    $error_description = 'An unexpected condition was encountered';
    ?>
    @include('errors._template')
@endsection