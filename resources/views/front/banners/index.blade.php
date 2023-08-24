@extends('layout.master')

@section('content')

    @include('admin.partials.breadcrumb', ['page'=>'Баннеры'])

    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title">{{ __('Баннеры страницу') }}</h6>
                        <a href="{{ route('admin.banners.create') }}" class="btn btn-success"> {{ __('Добавить') }}</a>
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
                            @foreach ($banners as $banner)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {!! $banner->getTranslatedAttributes(session('locale_id'))->title ?? 'No title' !!} </td>
                                    <td> {!! $banner->getTranslatedAttributes(session('locale_id'))->description ?? 'No Description' !!} </td>
                                    <td class="d-flex align-items-center">
                                        <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-success" style="margin-right: 10px;">
                                            {{__('Редактировать')}}
                                        </a>
                                        <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST">
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

