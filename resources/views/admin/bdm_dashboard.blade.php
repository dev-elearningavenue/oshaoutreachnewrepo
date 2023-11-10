@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row mtpx-40 ta-center">
        <div class="col-md-3">
            <strong class="fs-large">Total Orders</strong>
            <h4 class="fc-primary">{{ number_format($total_orders) }}</h4>
        </div>
        <div class="col-md-3">
            <strong class="fs-large">Total Payments</strong>
            <h4 class="fc-primary">{{ number_format($total_payments) }}</h4>
        </div>
        <div class="col-md-3">
            <strong class="fs-large">Total Enquiries</strong>
            <h4 class="fc-primary">{{ number_format($total_group_enrollment_enquiries) }}</h4>
        </div>
    </div>
@endsection

@section('scripts')
@endsection