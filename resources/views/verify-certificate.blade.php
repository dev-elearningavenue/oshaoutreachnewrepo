@extends('layouts.master')

@section('title', isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'About Us | ' . config('app.name'))

@section('styles')
    <style>
        div#whyus-about {
            padding-top: 50px;
            margin-top: -50px;
        }

        form {
            display: flex;
            padding:25px;
        }

        input[type=text] {
            flex-grow: 1;
        }

        .form-div button {
            background: #0158ca !important;
            color: white !important;
            border: none !important;
        }

        .form-div {
            border: 1px solid #ccc;
            height: 100px;
        }
    </style>

<style>
    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    
    #customers tr:nth-child(even){background-color: #f2f2f2;}
    
    #customers tr:hover {background-color: #ddd;}
    
    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #04AA6D;
      color: white;
    }
    </style>

    @if (isset($page['seo_tags']))
        @foreach ($page['seo_tags'] as $meta_name => $meta_content)
            @if ($meta_name != 'title')
                <meta name="{{ $meta_name }}" content="{{ $meta_content }}" />
            @endif
        @endforeach
    @endif
    <meta property="og:title" content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Certificate Verification' }}">
    <meta property="twitter:title" content="{{ isset($page['seo_tags']['title']) ? $page['seo_tags']['title'] : 'Certificate Verification' }}">
    <meta property="og:description"
        content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'Certificate Verification' }}">
    <meta property="twitter:description"
        content="{{ isset($page['seo_tags']['description']) ? strip_tags($page['seo_tags']['description']) : 'Certificate Verification' }}">
    <meta property="og:image" content="{{ url('/images/osha-outreach-courses.png') }}">
    <meta property="twitter:image" content="{{ url('/images/osha-outreach-courses.png') }}">
    <!-- Meta Tags for Social Media -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="OSHA Outreach Courses">
    <meta property="fb:app_id" content="817832821974771" />
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:site" content="@OshaOutreach">
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "BreadcrumbList",
        "name": "Breadcrumb",
        "itemListElement": {
            "@type": "ListItem",
            "position": 1,
            "name": "{{ isset($page['h1_heading']) ? $page['h1_heading'] : 'Certificate Verification' }}"
        }
    }

    

    </script>
@endsection

@section('content')
    <section class="--inner-banner">
        <div class="inner-content inner-banner"
            style="background-image: url('{{ asset('images/banner/about-banner.jpg') }}');background-position:center 10%;">
            <div class="container">
                <h1 class="title fc-white ta-center">
                    Certificate Verification</h1>
            </div>
        </div>
    </section>

    {{-- why to enroll video section here --}}

    <section class="home-intro sec-padding">
        <div class="container">
            <div class="box --course-objectives">
                <p class="desc fw-bold">All certificates Issued by OSHA Outreach Courses and its ATP can be verified Online with a
                    unique
                    certificate number and also certificate is provided with QR code for direct onsite verification using
                    your smart phone and QR scanner App. You can also verify your certificate by dropping an email at
                    help@oshaoutreachcourses.com To Verify a Certificate, Input the Certificate no. Below

                </p>
                <p class="desc"> Please contact us regarding fraudulent certificates.</p>

                <div class="row">
                    <div class="col-md-12 form-div">
                        <form method="GET" action="verify-certificate">
                            <input required  placeholder="Enter Certificate Code" type="text" name="certificate_number" class="form-control" >
                            <input type="submit" value="Search" class="btn highlights" class="submit">
                        </form>
                    </div>

                    <br/></br>

                    @if($verify != null && count($verify) > 0 )
                        <table id="customers">
                            <thead>
                                <th>Name</th>
                                <th>Training</th>
                                <th>Issued By</th>
                                <th>Certificate Number</th>
                                <th>Date of Issue</th>
                                <th>Valid Till</th>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>{{$verify[0]->name}}</td>
                                    <td>{{$verify[0]->training}}</td>
                                    <td>{{$verify[0]->issued_by}}</td>
                                    <td>{{$verify[0]->certificate_number}}</td>
                                    <td>{{$verify[0]->date_of_issue}}</td>
                                    <td>{{$verify[0]->valid_till}}</td>
                                </tr>
                            </tbody>
                        </table>
                        @else
                        <h2>No Certificate Found</h2>
                    @endif

                </div>
            </div>
        </div>
    </section>



    @include('partials._comparison_features')

    @include('partials._our_clients', ['classes' => 'bg-secondary'])

    {{-- why to enroll video section here --}}
    @stack('modal_content')

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.usp-col').matchHeight();
        });
    </script>
@endsection
