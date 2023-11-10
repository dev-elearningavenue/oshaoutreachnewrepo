@extends('layouts.admin')

@section('title')
    Coupons
@endsection

@section('content')

    <div class="row">
        <div class="col-md-9">
            <h3>Coupons</h3>
        </div>
        <div class="col-md-3">
            <a href="{{ route('coupons.create')}}" class="btn --btn-primary --btn-small float-right mbpx-10">Add New</a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success')}}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <tr>
            <th>Code</th>
            <th>Type</th>
            <th>Amount</th>
            <th>BDM</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        @foreach($coupons as $coupon)
            <tr>
                <td>
                    {{ $coupon->code }}
                </td>
                <td>{{ ($coupon->type===COUPON_TYPE_FIXED?'FIXED':'PERCENT') }}</td>
                <td>
                    {{ $coupon->amount }}
                </td>
                <td>
                    {{ $coupon->bdm ?? 'No BDM' }}
                </td>
                <td>
                    {{ $coupon->status?'Active':'Inactive' }}
                </td>
                <td>{{ \Carbon\Carbon::parse($coupon->created_at)->timezone('Canada/Eastern')->format('d/m/y H:i A') }}</td>
                <td>
                    <a href="{{ route('coupons.edit',$coupon->id) }}" class="btn btn-xs btn-primary"><i
                                class="glyphicon glyphicon-edit"></i> Edit</a> | <a data-delete-id="{{$coupon->id}}"
                                                                                    class="btn btn-xs btn-danger delete-btn"
                                                                                    onclick="clicked({{$coupon->id}})"><i
                                class="glyphicon glyphicon-remove"></i> Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
    <form method="POST" id='deleteForm'>
        <input type="hidden" name="_method" value="delete">
        {!! csrf_field() !!}
    </form>
    <style>
        .alert.alert-success{
            display: block;
            background: #005384 ;
            color: #fff;
            font-size: 16px;
            padding: 5px 15px;
            margin: 10px 0;
            font-weight: 600;
        }
    </style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function clicked(id) {
        var deleteResourceUrl = '{{ url()->current() }}';
        $('#deleteForm').attr('action', deleteResourceUrl + '/' + id);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if(result.value){
                $('#deleteForm').submit();
                Swal.fire(
                    'Deleted!',
                    'Coupon has been deleted.',
                    'success'
                );
            }
        });
    }
</script>
@endsection
