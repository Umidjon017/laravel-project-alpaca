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

                            @isset($page) @foreach($page->get() as $p)
                                <input type="hidden" name="page_id" value="{{ $p->id }}" />
                            @endforeach @endisset

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect"> {{ __('Добавить') }} </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @isset($page) @foreach($page->get() as $p)
        @foreach (app('App\Models\Admin\OurClient')->where('page_id', $p->id)->get() as $client)
            <div class="raw">
                <div class="d-flex justify-content-evenly flex-wrap">
                    <div class="card mt-3">
                <div class="card-header">
                    <div class="card-title">
                        <h6>{{ __('Блок Наши клиенты') }} {{ $loop->iteration }}</h6>
                        <form action="{{ route('admin.clients.destroy', $client->id) }}"
                              method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm float-end ms-2">
                                {{ __('Удалить') }}
                            </button>
                        </form>
                        <a href="{{ route('admin.clients.edit', $client->id) }}"
                           class="btn btn-success btn-sm float-end text-capitalize">{{ __('Редактировать') }}</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="example">
                        <div>
                            <h6> {{ __('Заголовок') }} </h6>
                            <p class="mb-1"> {!! $client->getTranslatedAttributes(session('locale_id'))->title !!} </p>
                        </div>

                        <hr>

                        <div>
                            <h6> {{ __('Описание') }} </h6>
                            <p class="mb-1"> {!! $client->getTranslatedAttributes(session('locale_id'))->description !!} </p>
                        </div>
                    </div>
                </div>
            </div>
                </div>
            </div>
        @endforeach

        <div class="raw">
            <div class="d-flex justify-content-evenly flex-wrap">
            @foreach(app('App\Models\Admin\OurClientLogo')->where('page_id', $p->id)->get() as $clientLogo)
                <div class="card mt-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h6> {{ __('Блок логотипа клиентов') }} {{ $loop->iteration }} </h6>
                            <form action="{{ route('admin.clients_logo.destroy', $clientLogo->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm float-end ms-2">{{ __('Удалить') }}</button>
                            </form>
                            <button type="button" class="btn btn-success btn-sm float-end text-capitalize"
                                    data-bs-toggle="modal" data-bs-target="#editClientsLogo{{$clientLogo->id}}">{{ __('Редактировать') }}
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <div>
                                <h6>{{ __('Логотип') }}</h6>
                                <img src="{{ asset(clients_logo_file_path().$clientLogo->logo) }}" alt="" width="200">
                            </div>

                            <div>
                                <h6> {{ __('Ссылка') }} </h6>
                                <p> {{$clientLogo->link}} </p>
                            </div>
                        </div>
                    </div>
                </div>

                @include('admin.pages.clients_logo.edit')
             @endforeach
            </div>
        </div>
    @endforeach @endisset

@endsection

@push('custom-scripts')
    <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('body');
    </script>
@endpush
