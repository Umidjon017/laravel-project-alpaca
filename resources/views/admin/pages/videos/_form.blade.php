<div class="form-group">
    <label for="video-player">
        {{ __('Введите ссылку на видео (*)') }}
    </label>
    <div id="video-player" class="video-player-preview">
        <input type="text" name="video_url" class="form-control" @isset($video) value="{{$video->video_url}}" @endisset required />
    </div>
    @error('video_url')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>

<br>

<div class="form-group">
    <label for="video-poster">
        {{ __('Загрузите или перетащите сюда свои логотипы') }}
    </label>
    <div id="video-poster" class="image-preview">
        <input type="file" name="video_poster" class="form-control" @isset($video) value="{{$video->video_poster}}" @endisset />
    </div>
    @error('video_poster')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>

@isset($video)
    <div class="raw mt-3">
        <div class="col-12">
            <h6>Video Poster</h6>
            <img src="{{asset(videos_file_path().$video->video_poster)}}" alt="Video poster">
        </div>
    </div>
@endisset

@isset($id)
    <input type="hidden" name="page_id" value="{{ $id->id }}" />
@endisset

<br>

<div class="d-flex justify-content-between">
    <button type="submit" class="btn btn-primary me-2"> @if(isset($video)) {{ __('Сохранить') }} @else {{ __('Добавить') }} @endif </button>
</div>
