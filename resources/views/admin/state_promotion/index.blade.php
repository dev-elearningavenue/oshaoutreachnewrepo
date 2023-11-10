@extends('layouts.admin')

@section('title')
    State Guidelines
@endsection

@section('content')
    <div class="row">
        <div class="col-md-9">
            <h3 style="border-bottom: 2px solid #005384 ;display: inline-block; margin-bottom: 30px;">State Guidelines</h3>
        </div>
        <div class="col-md-3">
            <a href="{{ route('state-promotion.create')}}" class="btn --btn-primary --btn-small float-right mbpx-10">Add New</a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            <strong class="fc-primary">{{ session('success')}}</strong>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-striped" id="courses-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Last Updated</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($statePromotions as $statePromotion)
                        <tr>
                            <td>{{ $statePromotion->id }}</td>
                            <td>{{ $statePromotion->name }}</td>
                            <td>{{ $statePromotion->slug }}</td>
                            <td>{{ \Carbon\Carbon::parse($statePromotion->updated_at)->format('d/m/Y h:i A') }}</td>
                            <td>
                                <a style="font-size: 12px;padding: 5px 4px;" class="btn --btn-primary --btn-small"
                                   href="{{ route('state-promotion.edit', [ $statePromotion->id ]) }}">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#courses-table').DataTable({
                paging: true,
                pageLength: 50,
                lengthMenu: [[10, 25, 50, 100, 250, 500, -1], [10, 25, 50, 100, 250, 500, "All"]],
                order: [[ 0, 'asc']]
            });
        });
    </script>
@endsection
