@extends('layouts.admin')

@section('title')
    All Courses
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 style="border-bottom: 2px solid #005384 ;display: inline-block; margin-bottom: 30px;">Courses</h3>
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
                    <th>LMS</th>
                    <th>Price</th>
                    <th>Discounted Price</th>
                    <th>Published</th>
                    <th>Updated at</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td>{{ $course->title }}
                                <a style="font-size: 12px;padding: 5px 4px;margin-top: 15px;" class="fc-primary fw-bold"
                                   href="{{ route('course.single', [ $course->slug ]) }}" target="_blank">
                                    (Preview)</a>
                            </td>
                            <td>{{ $course->slug }}</td>
                            <td>@if($course->lms === LMS_TYPE_OSHA_OUTREACH)
                                    <strong style="color: #005384">OSHA Outreach</strong>
                                @else
                                    <strong style="color: #cb0000">Pure Safety</strong>
                                @endif
                            </td>
                            <td><strong>$</strong>{{ number_format($course->price, 2) }}</td>
                            <td><strong>$</strong>{{ number_format($course->discounted_price, 2) }}</td>
                            <td>{{ $course->published ? 'Yes' : 'No' }}</td>
                            <td>{{ \Carbon\Carbon::parse($course->updated_at)->format('d/m/Y H:i A') }}</td>
                            <td>
                                <a style="font-size: 12px;padding: 5px 4px;" class="btn --btn-primary --btn-small"
                                   href="{{ route('admin.courses_edit', [ $course->id ]) }}">
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
