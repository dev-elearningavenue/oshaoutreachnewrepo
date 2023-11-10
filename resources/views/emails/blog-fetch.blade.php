@extends('layouts.email')

@section('content')
    @if($status === 'success')
        <p>Blogs have been successfully fetched on main website.</p>
    @else
        <p>Something went wrong while fetching blogs, please see <i>logs</i> for more details.</p>
        @if(isset($errorMsg))
            <p>Error Message: {{ $errorMsg }}</p>
        @endif
    @endif
@endsection
