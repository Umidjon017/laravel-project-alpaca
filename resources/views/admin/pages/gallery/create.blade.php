{{-- Brand Modal --}}
<div class="modal fade" id="addGallery" tabindex="-1" role="dialog" aria-labelledby="addFormModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFormModal"> {{ __('Add Gallery') }} </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label for="image-upload" id="image-label">
                            {{ __('Upload or drop your images here') }}
                        </label>
                        <div id="image-preview" class="image-preview">
                            <input type="file" name="images[]" class="form-control" multiple/>
                        </div>
                        @error('images')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <input type="hidden" name="page_id" value="{{ $page->id }}" />

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect"> {{ __('Add') }} </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
