@extends('layout.master')

@section('content')

    @include('admin.partials.breadcrumb', ['page'=>'Наши клиенты'])

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title">{{ __('Страница наших клиентов') }}</h6>
                        @if($partners->isEmpty())
                            <a href="{{ route('admin.main-page.partners.create') }}" class="btn btn-success"> {{ __('Добавить') }}</a>
                        @endif
                    </div>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th class="text-start"> # </th>
                                <th> {{ __('Заголовок') }} </th>
                                <th> {{ __('Описание') }} </th>
                                <th class="w-25"> {{ __('Действие') }} </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($partners as $partner)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {{ $partner->translatable()->title ?? 'No title' }} </td>
                                    <td> {{ $partner->translatable()->description ?? 'No description' }} </td>
                                    <td class="d-flex align-items-center">
                                        <a href="{{ route('admin.main-page.partners.edit', $partner->id) }}" class="btn btn-success" style="margin-right: 10px;">
                                            {{__('Редактировать')}}
                                        </a>
                                        <form action="{{ route('admin.main-page.partners.destroy', $partner->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">{{__('Удалить')}}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title">{{ __('Страница логотипов наших клиентов') }}</h6>
                        <a href="{{ route('admin.main-page.partner-logos.create') }}" class="btn btn-success"> {{ __('Добавить') }}</a>
                    </div>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th class="text-start"> # </th>
                                <th> {{ __('Изображение') }} </th>
                                <th> {{ __('Ссылка') }} </th>
                                <th class="w-25"> {{ __('Действие') }} </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($partner_logos as $partner)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td>
                                        <img src="{{ asset(partners_file_path() . $partner->logo) }}" alt="Partners" style="border-radius: 0; width: 25%">
                                    </td>
                                    <td> {!! $partner->link ?? 'No link' !!} </td>
                                    <td class="d-flex align-items-center">
                                        <a href="{{ route('admin.main-page.partner-logos.edit', $partner->id) }}" class="btn btn-success" style="margin-right: 10px;">
                                            {{__('Редактировать')}}
                                        </a>
                                        <form action="{{ route('admin.main-page.partner-logos.destroy', $partner->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">{{__('Удалить')}}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

