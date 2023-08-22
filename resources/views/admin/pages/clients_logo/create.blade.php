{{-- Brand Modal --}}
{{--<div class="modal fade" id="addClientLogo" tabindex="-1" role="dialog" aria-labelledby="addFormModal" aria-hidden="true">--}}
{{--    <div class="modal-dialog" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title" id="addFormModal"> {{ __('Добавить логотип') }} </h5>--}}
{{--                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <form action="{{ route('admin.clients_logo.store') }}" method="POST" enctype="multipart/form-data">--}}
{{--                @csrf--}}
{{--                <div class="modal-body">--}}

{{--                    <div class="form-group">--}}
{{--                        <label for="image-upload" id="image-label">--}}
{{--                            {{ __('Загрузите или перетащите сюда свои логотипы') }}--}}
{{--                        </label>--}}
{{--                        <div id="image-preview" class="image-preview">--}}
{{--                            <input type="file" name="logo" class="form-control"/>--}}
{{--                        </div>--}}
{{--                        @error('logo')--}}
{{--                        <div class="alert alert-danger">--}}
{{--                            {{ $message }}--}}
{{--                        </div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}

{{--                    <div class="mt-3">--}}
{{--                        <label class="form-label" for="link"> {{ __('Добавить ссылку') }} (*) </label>--}}
{{--                        <input type="text" id="link" name="link" class="form-control" required/>--}}
{{--                        @error('link')--}}
{{--                        <div class="alert alert-danger">--}}
{{--                            {{ $message }}--}}
{{--                        </div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}

{{--                    <input type="hidden" name="page_id" value="{{ $page->id }}" />--}}

{{--                    <div class="card-footer">--}}
{{--                        <button type="submit" class="btn btn-primary m-t-15 waves-effect"> {{ __('Добавить') }} </button>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
