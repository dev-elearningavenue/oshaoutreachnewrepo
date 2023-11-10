@extends('layouts.email')

@section('content')

<h3>Hi {{$order->first_name}} {{$order->last_name}},</h3>
    <p>Your order for <strong>
      	@php
      	for($i=0;$i<$productCount;$i++){
      			echo $productsTitle[$i];
      		 if($i<$productCount-2)
      		 	echo ', ';
      		 else if($i<$productCount-1)
      		 	echo ' & ';
      	}

      	@endphp
     </strong>is selected for {{$order->discount}}% discount on our website <a href="{{url('/')}}">oshaoutreachcourses.com</a> please <a href="{{url('/order-special-offer/'.$order->uoid)}}">click here</a> to complete your order or let us know if you require more information. </p>

Regards<br/>
Support Team<br/>
OSHA Outreach Courses<br/>
E: help@oshaoutreachcourses.com<br/>
P: 1-833-212-6742

@endsection
