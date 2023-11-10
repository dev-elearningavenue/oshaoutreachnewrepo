@extends('layouts.admin')

@section('title')
    All Courses
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 style="border-bottom: 2px solid #005384 ;display: inline-block; margin-bottom: 30px;">Group Slabs</h3>
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
                    <th>Courses</th>
                    <th>Details</th>
                    <th>Updated at</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($groupSlabs as $slab)
                        <tr>
                            <td>{{ $slab->id }}</td>

                            <td>
                               @php
                                    $courses = \App\Models\Product::query()
                                        ->select('id', 'title')
                                        ->whereIn('id', explode(',', $slab->courses))
                                        ->get();
                               @endphp
                               @foreach($courses as $course)
                                   {{ $course->title }}
                                   <br/>
                               @endforeach
                            </td>
                            <td>
                                @php
                                    $minSlabs = $slab->min_slab;
                                    $maxSlabs = $slab->max_slab;
                                    $slabPrices = $slab->slab_price;
                                @endphp

                                @foreach($slabPrices as $key => $slabPrice)
                                    @php
                                        $maxSlabStr = $maxSlabs[$key] ? '-' . $maxSlabs[$key] : $maxSlabs[$key] . '+'
                                    @endphp
                                    <b>Slab:</b> {{ $minSlabs[$key] . $maxSlabStr  }}
                                    &nbsp;
                                    <b>Price:</b> ${{ $slabPrice }}
                                    <br/>
                                @endforeach
                            </td>
                            <td>{{ \Carbon\Carbon::parse($slab->updated_at)->format('d/m/Y h:i A') }}</td>
                            <td>
                                <a style="font-size: 12px;padding: 5px 4px;" class="btn --btn-primary --btn-small"
                                   href="{{ route('admin.group_slabs_edit', [ $slab->id ]) }}">
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
