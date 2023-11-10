@extends('layouts.admin')

@section('title')
    Edit Group Slabs
@endsection

@section('styles')
    <style>
        .content_textarea {
            min-height: 100px;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 style="border-bottom: 2px solid #005384 ;display: inline-block; margin-bottom: 30px;">Edit Group
                Slabs</h3>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            <strong class="fc-primary">{{ session('success')}}</strong>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-error" role="alert">
            <strong class="fc-red">{{ session('error')}}</strong>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => ['admin.group_slabs_update', $groupSlab], 'method' => 'post']) !!}
            <div class="main_slab_div">
                <div class="control-group">
                    <label for="title">Courses</label>
                    {{ Form::text('courses', "", ['class' =>'hidden']) }}
                    <div class="fs-medium" id="promotion-course-multiselect"></div>
                </div>

                <div id="discount_slabs_div">
                    <div class="row" style="border-bottom: 2px solid #005384;">

                        @foreach($groupSlab['slab_price'] as $key => $slabPrice)
                            <div class="control-group col-md-4">
                                <label for="min_slab">Min Slab</label>
                                <input
                                    type="number"
                                    class="form-field"
                                    name="min_slab[]"
                                    min="2"
                                    max="100"
                                    value="{{ $groupSlab['min_slab'][$key] }}"
                                    required
                                >
                            </div>

                            <div class="control-group col-md-4">
                                <label for="max_slab">Max Slab</label>
                                <input
                                    type="number"
                                    class="form-field"
                                    name="max_slab[]"
                                    min="2"
                                    max="100"
                                    value="{{ $groupSlab['max_slab'][$key] }}"
                                    {{ !$groupSlab['max_slab'][$key] ?? "required" }}
                                >
                            </div>

                            <div class="control-group col-md-4">
                                <label for="discount_slab">Price</label>
                                <input
                                    type="number"
                                    class="form-field"
                                    name="slab_price[]"
                                    min="2"
                                    max="100"
                                    value="{{ $slabPrice }}"
                                    required
                                >
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <br><br>
            {{--                <input type="hidden" id="faqs_count" name="faqs_count" value="{{ $faqs->count() }}"/>--}}
            <button type="button" id="add_more_slabs_btn" class="btn --btn-primary --btn-small">+ Add More</button>
            <br><br>
            <input type="submit" value="Save" class="btn --btn-primary">
            <br><br>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('/src/js/selectize-standalone.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/src/css/selectize.min.css') }}">
    <script type="text/javascript">
        $(document).ready(function () {
            const maxItems = 4;
            const lmsCourses = @json($lmsCourses);
            const existingPromotionCourses = "{{ $groupSlab['courses'] ?? "" }}"
            var selectize = $("#promotion-course-multiselect").selectize({
                options: lmsCourses.map((course) => {
                    return {
                        name: course.title,
                        value: course.id
                    }
                }),
                placeholder: "Select Promotion Courses",
                items: [],
                valueField: "value",
                labelField: "name",
                searchField: ["name"],
                plugins: maxItems > 1 ? ['remove_button'] : [],
                closeAfterSelect: true,
                singleOverride: true,
                maxItems: null,
                create: false,
                persist: false,
                onChange: function (val) {
                    const selectedItems = this.items;
                    const promotionCourseVal = selectedItems.length > 0 ? selectedItems : null

                    // Set Promotion Course Value on Form Field
                    $('input[name*="courses"]').val(promotionCourseVal)
                },
                onInitialize: function () {
                    // Initialize multiselect with existing values
                    if (existingPromotionCourses) {
                        this.setValue(existingPromotionCourses.split(','), false)
                        const selectedItems = this.items;
                        const promotionCourseVal = selectedItems.length > 0 ? selectedItems : null
                        $('input[name*="courses"]').val(promotionCourseVal)
                    }
                }
            });

            $('#add_more_slabs_btn').click(function () {

                var html = `
                    <div class="row" style="border-bottom: 2px solid #005384;">
                        <div class="control-group col-md-4">
                           <label for="min_slab">Min Slab</label>
                           <input
                                type="number"
                                class="form-field"
                                name="min_slab[]"
                                min="2"
                                max="100"
                                required
                           >
                       </div>

                        <div class="control-group col-md-4">
                           <label for="max_slab">Max Slab</label>
                           <input
                                type="number"
                                class="form-field"
                                name="max_slab[]"
                                min="2"
                                max="100"
                           >
                       </div>

                       <div class="control-group col-md-4">
                           <label for="discount_slab">Price</label>
                           <input
                                type="number"
                                class="form-field"
                                name="slab_price[]"
                                min="2"
                                max="100"
                                required
                           >
                       </div>
                    </div>
                `

                $('#discount_slabs_div').append(html);
            });

            // Preloading Counter
            $('#seo_tags_div textarea.content_textarea').each(function () {
                showCharacterCounter(this)
            });

            $('body').on('keyup', '#seo_tags_div textarea.content_textarea', function () {
                showCharacterCounter(this)
            });

            function showCharacterCounter(elem) {
                console.log($(elem).val().length);
                $(elem).next('span.counter').html($(elem).val().length)
            }
        });
    </script>
@endsection
