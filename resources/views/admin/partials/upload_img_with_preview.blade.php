@foreach($data as $item)
    <div class="control-group">
        <label for="description">{{ $item['title'] }}
            <span style="cursor:pointer;font-size:12px;font-weight:300;display:block" >
                {{ $item['infoText'] }}
            </span>
        </label>
        <br/>
        <input
            type="file"
            class="image_uploads"
            id="{{ $item['name'] }}"
            accept="image/png, image/gif, image/jpeg"
            name="{{ $item['name'] }}"
        />
        @if($errors->has( $item['name'] ))
            <span class="fc-red">{{ $errors->first( $item['name'] ) }}</span>
        @endif
        <br/>
        <br/>
        @if($edit === true)
            <div class="row">
                <div class="col-md-5">
                    <img alt="{{$item['name']}}" id="preview-{{ $item['name'] }}" src="{{ $item['src'] ?? "" }}" />
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-5">
                    <img id="preview-{{ $item['name'] }}" src="" />
                </div>
            </div>
        @endif
    </div>
@endforeach

@push('image_upload_scripts')
    $('.image_uploads').on('change', function () {
        var currentId = $(this).attr('id');
        var preview = document.getElementById('preview-'+currentId);

        console.log(currentId, 30)
        var file = document.getElementById(currentId).files[0];
        console.log(preview)
        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
        }
    })
@endpush
