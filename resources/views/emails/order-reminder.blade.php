@extends('layouts.email')

@section('content')

<h3>Hi {{$order->first_name}} {{$order->last_name}},</h3>
<p>We noticed you left something behind.</p>
<p>Looks like you didn't finish checking out. Would you like to complete your online training?</p>
<p>Resume your Order: <a href="{{ url('/order-special-offer/'.$order->uoid) }}">Click here</a></p>
<p>P.S. If you're having trouble placing your order online or have any questions, please reply to this email.</p>

Regards<br/>
Support Team<br/>
OSHA Outreach Courses<br/>
E: support@oshaoutreachcourses.com<br/>
P: 1-833-212-6742

@endsection
