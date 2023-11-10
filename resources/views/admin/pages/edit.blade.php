@extends('layouts.admin')

@section('title')
    Edit Page
@endsection

@section('styles')
    <style>
        .content_textarea{
            min-height: 100px;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 style="border-bottom: 2px solid #005384 ;display: inline-block; margin-bottom: 30px;">Edit Page</h3>
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
            {!! Form::open(['route' => ['admin.pages_update', $page], 'method' => 'post']) !!}
            <h6>Content</h6>

            <div class="control-group">
                <label for="h1_heading">H1 Heading</label>
                {{ Form::text('h1_heading', $content['h1_heading'], ['class' =>'form-field', 'required' => 'required']) }}
            </div>

            <div class="control-group">
                <label for="title">Image Alt Text</label>
                {{ Form::text('img_alt', $content['img_alt'], ['class' =>'form-field']) }}
            </div>

            <div class="control-group">
                <label for="title">Promotion Courses</label>
                {{ Form::text('promotion_courses', "", ['class' =>'hidden']) }}
                <div class="fs-medium" id="promotion-course-multiselect"></div>
            </div>

            <h6>SEO Tags</h6>
            <div id="seo_tags_div">
            @foreach($content['seo_tags'] as $meta_name => $meta_content)
                <div class="row">
                    <div class="col-md-4">
                        <div class="control-group">
                            <label for="name">Name</label>
                            {{ Form::text('name[]', $meta_name, ['class' =>'form-field']) }}
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="control-group">
                            <label for="content">Content</label>
                            {{ Form::textarea('content[]', $meta_content, ['class' =>'form-field content_textarea', 'rows'=>3]) }}
                            <span class="counter"></span>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            <input type="hidden" id="seo_tags_count" name="seo_tags_count" value="{{ count($content['seo_tags']) }}" />
            <button type="button" id="add_more_tag_btn" class="btn --btn-primary --btn-small">+ Add More</button>
            <br><br>
            @if($page == 'home')
            <h6>FAQ</h6>
            <div id="faqs_div">
                @php($ii = 1)
                @foreach($faqs as $faq)
                    <div class="row">
                        <br><br>
                        <div class="col-md-4">
                            <div class="control-group">
                                <label for="name">Question {{ $ii }}</label>
                                {{ Form::textarea('faq_question[]', $faq->question, ['class' =>'form-field content_textarea', 'rows'=>3]) }}
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="control-group">
                                <label for="content">Answer {{ $ii }}</label>
                                {{ Form::textarea('faq_answer[]', $faq->answer, ['class' =>'form-field content_textarea', 'rows'=>3]) }}
                            </div>
                        </div>
                    </div>
                    @php($ii++)
                @endforeach
            </div>
            <br><br>
            <input type="hidden" id="faqs_count" name="faqs_count" value="{{ $faqs->count() }}"/>
            <button type="button" id="add_more_faq_btn" class="btn --btn-primary --btn-small">+ Add More</button>
            <br><br>
            @endif
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
            const existingPromotionCourses = "{{ $content['promotion_courses'] ?? "" }}"
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
                onChange: function(val) {
                    const selectedItems = this.items;
                    const promotionCourseVal = selectedItems.length > 0 ? selectedItems : null

                    // Set Promotion Course Value on Form Field
                    $('input[name*="promotion_courses"]').val(promotionCourseVal)
                },
                onInitialize: function () {
                    // Initialize multiselect with existing values
                    if(existingPromotionCourses) {
                        this.setValue(existingPromotionCourses.split(','), false)
                        const selectedItems = this.items;
                        const promotionCourseVal = selectedItems.length > 0 ? selectedItems : null
                        $('input[name*="promotion_courses"]').val(promotionCourseVal)
                    }
                }
            });


            $('#add_more_tag_btn').click(function () {
                var html = '<div class="row">' +
                    '    <div class="col-md-4">' +
                    '       <div class="control-group">' +
                    '           <label for="name">Name</label>' +
                    '           <input type="text" name="name[]" class="form-field"/>' +
                    '       </div>' +
                    '    </div>' +
                    '    <div class="col-md-8">' +
                    '       <div class="control-group">' +
                    '           <label for="content">Content</label>' +
                    '           <textarea name="content[]" class="form-field content_textarea" rows="3" ></textarea>' +
                    '<span class="counter"></span>'+
                    '       </div>' +
                    '    </div>' +
                    '</div>';
                $('#seo_tags_div').append(html);

                var seo_tags_count = parseInt($('#seo_tags_count').val());
                $('#seo_tags_count').val(++seo_tags_count);
            });

            @if($page == 'home')
            $('#add_more_faq_btn').click(function () {
                var faqs_count = parseInt($('#faqs_count').val());
                $('#faqs_count').val(++faqs_count);

                var html = '<div class="row" style="border-bottom: 2px solid #005384 ;">' +
                    '    <br/><div class="col-md-4">' +
                    '       <div class="control-group">' +
                    '           <label for="faq_question">Question '+ faqs_count +'</label>' +
                    '           <textarea name="faq_question[]" class="form-field content_textarea" rows="3" ></textarea>' +
                    '       </div>' +
                    '    </div>' +
                    '    <div class="col-md-8">' +
                    '       <div class="control-group">' +
                    '           <label for="faq_answer">Answer '+ faqs_count +'</label>' +
                    '           <textarea name="faq_answer[]" class="form-field content_textarea" rows="3" ></textarea>' +
                    '       </div>' +
                    '    </div>' +
                    '</div>';
                $('#faqs_div').append(html);
            });
            @endif

            // Preloading Counter
            $('#seo_tags_div textarea.content_textarea').each(function(){
                showCharacterCounter(this)
            });

            $('body').on('keyup','#seo_tags_div textarea.content_textarea', function(){
                showCharacterCounter(this)
            });

            function showCharacterCounter(elem){
                console.log($(elem).val().length);
                $(elem).next('span.counter').html($(elem).val().length)
            }
        });
    </script>
@endsection
