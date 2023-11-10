@inject('arrays','App\Http\Utilities\Arrays')
@extends('layouts.admin')

@section('title')
    Add State Guidelines
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
            <h3 style="border-bottom: 2px solid #005384 ;display: inline-block; margin-bottom: 30px;">Add State
                Guidelines</h3>
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
            {!! Form::open(['route' => 'state-promotion.store', 'method' => 'post', 'class' => 'group-enrollment-form', 'enctype' =>"multipart/form-data"]) !!}

            <div class="control-group">
                <label for="title">Name</label>
                {{ Form::text('name', null, ['class' =>'form-field', 'required' => 'required']) }}
                @if($errors->has('name'))
                    <span class="fc-red">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="control-group">
                <label for="slug">Slug</label>
                {{ Form::text('slug', null, ['class' =>'form-field', 'required' => 'required']) }}
                @if($errors->has('slug'))
                    <span class="fc-red">{{ $errors->first('slug') }}</span>
                @endif
            </div>

            <div class="control-group">
                <label for="description">Heading</label>
                {{ Form::text('heading', null, ['class' =>'form-field']) }}
                @if($errors->has('heading'))
                    <span class="fc-red">{{ $errors->first('heading') }}</span>
                @endif
            </div>

            @include('admin.partials.upload_img_with_preview', [
                   'data' => [
                       [
                           'title' => 'Banner Image (H1 Banner)',
                           'name' => 'banner_img',
                           'infoText' => 'Max image upload size is 2 MB; Recommended image resolution is 1920 x 250 pixels',
                       ],
                   ],
                   'edit' => false
           ])

            <div class="control-group">
                <label for="description">Courses</label>
                {{ Form::text('courses', null, ['class' =>'form-field']) }}
                @if($errors->has('courses'))
                    <span class="fc-red">{{ $errors->first('courses') }}</span>
                @endif
            </div>

            <div class="control-group">
                <label for="description">Excerpt</label>
                {{ Form::textarea('excerpt', "", ['id' => 'excerpt', 'class' =>'form-field']) }}
                @if($errors->has('excerpt'))
                    <span class="fc-red">{{ $errors->first('excerpt') }}</span>
                @endif
            </div>

            <div class="control-group">
                <label for="description">Obligations</label>
                {{ Form::textarea('obligations', "", ['id' => 'obligations', 'class' =>'form-field']) }}
                @if($errors->has('obligations'))
                    <span class="fc-red">{{ $errors->first('obligations') }}</span>
                @endif
            </div>

            <div class="control-group">
                <label for="description">Advantages</label>
                {{ Form::textarea('advantages', "", ['id' => 'advantages', 'class' =>'form-field']) }}
                @if($errors->has('advantages'))
                    <span class="fc-red">{{ $errors->first('advantages') }}</span>
                @endif
            </div>

            <div class="control-group">
                <input type="hidden" name="published" value="0">
                <input type="checkbox" name="published" value="1">
                <label for="published">Published</label>
                @if($errors->has('published'))
                    <p class="fc-red">{{ $errors->first('published') }}</p>
                @endif
            </div>

            <input type="submit" value="Save" class="btn --btn-primary">
            <br><br>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('src/js/ckeditor.js') }}"></script>
    @include('admin.partials.ckeditor_image_adapter')
    <script type="text/javascript">
        $(document).ready(function () {
            @stack('image_upload_scripts')

            ClassicEditor
                .create(document.querySelector('#excerpt'), globalConfig)
                .catch(error => {
                    console.error(error);
                });

            ClassicEditor
                .create(document.querySelector('#obligations'), globalConfig)
                .catch(error => {
                    console.error(error);
                });

            ClassicEditor
                .create(document.querySelector('#advantages'), globalConfig)
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endsection
