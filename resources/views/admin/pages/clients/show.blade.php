@extends('layout.master')

@push('style')
    <link rel="stylesheet" href="{{ asset('front/style/css/video.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
@endpush

@section('content')
    @foreach($clients as $client) @endforeach

    @include('admin.partials.breadcrumb', [
        'subPage'=>'Посмотреть',
        'page'=>'Страницы',
        'pageUrl'=>route('admin.pages.index'),

        'subPage2'=>'page_id',
        'page2'=>$client->page_id,
        'pageUrl2'=>route('admin.pages.show', $client->page_id)
    ])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{ __('Идентификатор страницы:') }} {{ $client->page_id }}</h6>

                    <div class="raw">
                        <div class="d-flex justify-content-evenly flex-wrap">
                            @foreach ($clients as $client)
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
                                                <p class="mb-1"> {!! $client->translatable()->title !!} </p>
                                            </div>

                                            <hr>

                                            <div>
                                                <h6> {{ __('Описание') }} </h6>
                                                <p class="mb-1"> {!! $client->translatable()->description !!} </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="raw">
                        <div class="d-flex justify-content-evenly flex-wrap">
                            @foreach($clientLogos as $clientLogo)
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

                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script src="{{ asset('assets/js/dropify.js') }}"></script>
    <script src="{{ asset('front/js/script.js') }}"></script>
    <script src="{{ asset('front/js/video.js') }}"></script>
@endpush
