@inject('arrays','App\Http\Utilities\Arrays')
@extends('layouts.admin')

@section('title')
    Edit Course
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
            <h3 style="border-bottom: 2px solid #005384 ;display: inline-block; margin-bottom: 30px;">Edit Course</h3>
            @if($next_course)
                <a class="btn --btn-primary float-right" href="{{ route('admin.courses_edit', [$next_course->id]) }}">
                    <small> {{ $next_course->title }}&nbsp;&nbsp;>></small>
                </a>
            @endif
            @if($prev_course)
            <a class="btn --btn-primary float-right" style="margin-right: 20px;" href="{{ route('admin.courses_edit', [$prev_course->id]) }}">
                <small><<&nbsp;&nbsp;{{ $prev_course->title }}</small>
            </a>
            @endif
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
            {!! Form::model($course, ['route' => ['admin.courses_update', $course->id], 'method' => 'post']) !!}
            <h6 class="d-inline-block">Content</h6>
            <a class="h6 float-right fc-primary" target="_blank" href="{{ route('course.single', [ $course->slug ]) }}"><i class="xicon icon-language"></i> Preview</a>

            <div class="control-group">
                <label for="title">H1 Heading</label>
                {{ Form::text('title', null, ['class' =>'form-field', 'required' => 'required']) }}
            </div>
            @if($course->id > 99)
                <div class="control-group">
                    <label for="slug">Slug</label>
                    {{ Form::text('slug', null, ['class' =>'form-field', 'required' => 'required']) }}
                </div>
            @endif
            <div class="control-group">
                <label for="description">Description</label>
                {{ Form::textarea('description', null, ['class' =>'form-field', 'id' => 'description']) }}
            </div>
            <div class="control-group">
                <label for="description">Course Outline</label>
                {{ Form::textarea('outline', str_replace("<br />","\n", $course->outline), ['class' =>'form-field']) }}
            </div>
            <div class="control-group">
                <label for="description">Learning Objectives</label>
                {{ Form::textarea('learning_objective', str_replace("<br />","\n", $course->learning_objective), ['class' =>'form-field']) }}
            </div>
            <div class="control-group">
                <label for="price">Price</label>
                {{ Form::number('price', null, ['class' =>'form-field', 'required' => 'required', 'step' => 0.01]) }}
            </div>
            <div class="control-group">
                <label for="price">Discounted Price</label>
                {{ Form::number('discounted_price', null, ['class' =>'form-field', 'step' => 0.01, 'max' => $course->price]) }}
            </div>
            <div class="control-group">
                <label for="price">Training ID</label>
                {{ Form::number('course_id', null, ['class' =>'form-field', 'required' => 'required']) }}
            </div>
            <div class="control-group">
                <input type="checkbox" name="published" @if($course->published) Checked="checked" @endif>
                <label for="published">Published</label>
            </div>

            <h6>Variants</h6>
            <div id="variants_div">
                @foreach($course->variants as $variant)
                    <div class="row">
                        <div class="col-md-6">
                            <div class="control-group">
                                <label for="name">Language</label>
                                {{ Form::select('variant_language[]', $languages, $variant->language, ['class' =>'form-field']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="control-group">
                                <label for="content">Product ID (SKU)</label>
                                {{ Form::text('variant_sku[]', $variant->sku, ['class' =>'form-field']) }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <input type="hidden" id="variants_count" name="variants_count" value="{{ count($course->variants) }}"/>
            <button type="button" id="add_more_variant_btn" class="btn --btn-primary --btn-small">+ Add More</button>
            <br><br>

            <h6>SEO Tags</h6>
            <div id="seo_tags_div">
                @foreach($course->seoTags as $seo_tag)
                    <div class="row">
                        <div class="col-md-4">
                            <div class="control-group">
                                <label for="name">Name</label>
                                {{ Form::select('name[]', [ '' => 'Select', 'title' => 'title', 'img_alt' => 'img_alt', 'description' => 'description', 'keywords' => 'keywords'] , $seo_tag->meta_name, ['class' =>'form-field']) }}
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="control-group">
                                <label for="content">Content</label>
                                {{ Form::textarea('content[]', $seo_tag->meta_content, ['class' =>'form-field content_textarea', 'rows'=>3]) }}
                                <span class="counter"></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <input type="hidden" id="seo_tags_count" name="seo_tags_count" value="{{ $course->seoTags()->count() }}"/>
            <button type="button" id="add_more_tag_btn" class="btn --btn-primary --btn-small">+ Add More</button>
            <br><br>
            <h6>FAQ</h6>
            <div id="faqs_div">
                @php($ii = 1)
                @foreach($course->faqs as $faq)
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
            <input type="hidden" id="faqs_count" name="faqs_count" value="{{ $course->faqs()->count() }}"/>
            <button type="button" id="add_more_faq_btn" class="btn --btn-primary --btn-small">+ Add More</button>
            <br><br>
            <h6>Related Courses</h6>
            <div class="row">
            @foreach($arrays::relatedCourses() as $arr_course_id => $arr_course)
                <div class="col-md-6">
                <input type="checkbox" name="related_courses[]" value="{{ $arr_course_id }}" @if(in_array($arr_course_id, $course->related_courses)) checked @endif > {{ strip_tags($arr_course['title']) }} - ID {{ $arr_course_id }}
                </div>
            @endforeach
            </div>
            <br><br>

            <input type="submit" value="Save" class="btn --btn-primary">
            <br><br>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('src/js/ckeditor.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            ClassicEditor
                .create(document.querySelector('#description'), {
                })
                .catch(error => {
                    console.error(error);
                });

            $('#add_more_variant_btn').click(function () {
                var html = `<div class="row">
                        <div class="col-md-6">
                            <div class="control-group">
                                <label for="name">Language</label>
                                <select class="form-field" name="variant_language[]">
	                                <option value="" selected="selected">Select</option>
	                                <option value="english">English</option>
	                                <option value="spanish">Spanish</option>
	                                <option value="canadian french">Canadian French</option>
	                                <option value="portuguese">Portuguese</option>
	                                <option value="german">German</option>
	                                <option value="chinese">Chinese</option>
	                                <option value="dutch">Dutch</option>
	                                <option value="polish">Polish</option>
	                                <option value="thai">Thai</option>
	                                <option value="french">French</option>
	                                <option value="japanese">Japanese</option>
	                                <option value="czech">Czech</option>
	                                <option value="italian">Italian</option>
	                                <option value="korean">Korean</option>
	                                <option value="russian">Russian</option>
	                                <option value="hungarian">Hungarian</option>
	                                <option value="arabic">Arabic</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="control-group">
                                <label for="content">Product ID (SKU)</label>
                                <input class="form-field" name="variant_sku[]" type="text">
                            </div>
                        </div>
                    </div>`;
                $('#variants_div').append(html);

                var variants_count = parseInt($('#variants_count').val());
                $('#variants_count').val(++variants_count);
            });

            $('#add_more_tag_btn').click(function () {
                var html = '<div class="row">' +
                    '    <div class="col-md-4">' +
                    '       <div class="control-group">' +
                    '           <label for="name">Name</label>' +
                    '           <select class="form-field" name="name[]">' +
                    '               <option value="">Select</option>' +
                    '               <option value="title">title</option>' +
                    '               <option value="img_alt">img_alt</option>' +
                    '               <option value="description">description</option>' +
                    '               <option value="keywords">keywords</option>' +
                    '           </select>' +
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

            $('#add_more_faq_btn').click(function () {
                var faqs_count = parseInt($('#faqs_count').val());
                $('#faqs_count').val(++faqs_count);

                var html = '<div class="row">' +
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
