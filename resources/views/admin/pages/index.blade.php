@extends('layouts.admin')

@section('title')
    All Courses
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 style="border-bottom: 2px solid #005384 ;display: inline-block; margin-bottom: 30px;">Pages</h3>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            <strong class="fc-primary">{{ session('success')}}</strong>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-striped" id="pages-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Code Name</th>
                    <th>Heading</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($ii = 0)
                    @foreach($pages as $key => $page)
                        @php($ii++)
                        <tr>
                            <td>{{ $ii }}</td>
                            <td>{{ $key }}</td>
                            <td>{{ $page['h1_heading'] }}</td>
                            <td>
                                <a href="{{ route('admin.pages_edit', [ $key ]) }}">
                                    <button style="font-size: 12px;padding: 5px 4px;" class="btn --btn-primary --btn-small">Edit</button>
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
            $('#pages').DataTable({
                paging: true,
                pageLength: 50,
                lengthMenu: [[10, 25, 50, 100, 250, 500, -1], [10, 25, 50, 100, 250, 500, "All"]],
                order: [[ 0, 'asc']]
            });
        });
    </script>
@endsection