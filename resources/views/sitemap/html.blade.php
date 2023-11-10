@extends('layouts.master')

@section('title')
    Sitemap
@endsection

@section('content')
    <div class="page-heading">
        <h2 class="title mbpx-0">Sitemap</h2>
        <p class="subtitle"></p>
    </div>
    <section class="sec-padding">
        <div class="container">
            <div class="row">
                <h2>Pages</h2>
                <ul style="display: block; list-style-type: disc; -webkit-margin-before: 1em; -webkit-margin-after: 1em; -webkit-margin-start: 0px; -webkit-margin-end: 0px; -webkit-padding-start: 40px;">
                    @foreach ($pages as $page)
                        <li style="list-style-type: disc;"><a href="{{ $page['link'] }}">{{ $page['name'] }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endsection