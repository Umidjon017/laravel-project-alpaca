{{-- Brand Modal --}}
<div class="modal fade" id="addLanguage" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal"> {{ __('Add Language') }} </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.localizations.store') }}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label for="name"> {{ __('Language name') }} </label>
                        <input id="name" class="form-control" type="text" name="name" />
                        @error('name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect"> {{ __('Add') }} </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
