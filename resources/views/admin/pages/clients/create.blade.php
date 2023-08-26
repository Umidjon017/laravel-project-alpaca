@extends('layout.master')

@section('content')
    @include('admin.partials.breadcrumb', ['subPage'=>'Создать', 'page'=>'Страницы', 'pageUrl'=>route('admin.pages.index')])

    <div class="row mb-3">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">{{__('Добавить блок Наши клиенты')}}</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                        @csrf
                        @include('admin.pages.clients._form')
                    </form>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title"> {{__('Добавить блок с логотипом наших клиентов')}} </h6>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.clients_logo.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="image-upload" class="form-label"> {{ __('Загрузите или перетащите сюда свои логотипы') }} </label>
                                <input type="file" id="image-upload" name="logo" class="form-control"/>
                                @error('logo')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <label class="form-label" for="link"> {{ __('Добавить ссылку') }} (*) </label>
                                <input type="text" id="link" name="link" class="form-control" required/>
                                @error('link')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            @isset($id)
                                <input type="hidden" name="page_id" value="{{ $id->id }}" />
                            @endisset

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect"> {{ __('Добавить') }} </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('custom-scripts')
    <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('body');
    </script>
@endpush
