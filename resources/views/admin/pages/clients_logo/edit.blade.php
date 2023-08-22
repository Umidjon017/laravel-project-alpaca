{{-- Brand Modal --}}
<div class="modal fade" id="editClientsLogo{{$clientLogo->id}}" tabindex="-1" role="dialog" aria-labelledby="editFormModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editFormModal">{{ __('Редактировать логотип наших клиентов') }}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.clients_logo.update', $clientLogo->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <div class="raw">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="image-upload">
                                    {{ __('Загрузите или перетащите сюда свои логотипы') }}
                                </label>
                                <div id="image-preview" class="image-preview">
                                    <input type="file" name="logo" class="form-control" value="{{$clientLogo->logo}}"/>
                                </div>
                                @error('logo')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <label class="form-label" for="link"> {{ __('Добавить ссылку') }} (*) </label>
                                <input type="text" id="link" name="link" class="form-control" value="{{$clientLogo->link}}"/>
                                @error('link')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        @isset($clientLogo)
                            <div class="raw">
                                <img src="{{asset(clients_logo_file_path() . $clientLogo->logo)}}" alt="Clients Logo image" width="200">
                            </div>
                        @endisset
                    </div>

                    <input type="hidden" name="page_id" value="{{ $p->id }}" />

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect"> @if(isset($clientLogo)) {{ __('Сохранить') }} @else {{ __('Add') }} @endif </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
