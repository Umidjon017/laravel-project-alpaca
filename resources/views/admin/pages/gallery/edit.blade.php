{{-- Brand Modal --}}
<div class="modal fade" id="editGallery{{$gallery->id}}" tabindex="-1" role="dialog" aria-labelledby="editFormModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editFormModal">{{ __('Редактировать галерею') }}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <div class="raw">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="image-upload" id="image-label">
                                    {{ __('Загрузите или перетащите сюда свои логотипы') }}
                                </label>
                                <div id="image-preview" class="image-preview">
                                    <input type="file" name="images[]" class="form-control" multiple value="{{$gallery->image}}"/>
                                </div>
                                @error('images')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        @isset($gallery)
                            <div class="col-12">
                                <img src="{{asset(gallery_file_path() . $gallery->image)}}" alt="Gallery image">
                            </div>
                        @endisset
                    </div>

                    <input type="hidden" name="page_id" value="{{ $page->id }}" />

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect"> @if(isset($gallery)) {{ __('Сохранить') }} @else {{ __('Добавить') }} @endif </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
