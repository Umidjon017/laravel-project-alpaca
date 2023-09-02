@extends('layout.master')

@section('content')

    @include('admin.partials.breadcrumb', ['page'=>'Рекомендации'])

    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title">{{ __('Рекомендации страницу') }}</h6>
                        @if($recommendations->isEmpty())
                            <a href="{{ route('admin.main-page.recommendations.create') }}" class="btn btn-success"> {{ __('Добавить') }}</a>
                        @endif
                    </div>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th class="text-start"> # </th>
                                <th> {{ __('Заголовок') }} </th>
                                <th> {{ __('Описание') }} </th>
                                <th> {{ __('Ссылка') }} </th>
                                <th class="w-25"> {{ __('Действие') }} </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($recommendations as $recommendation)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {!! $recommendation->translatable()->title ?? 'No title' !!} </td>
                                    <td> {!! $recommendation->translatable()->description ?? 'No Description' !!} </td>
                                    <td> {!! $recommendation->link ?? 'No link' !!} </td>
                                    <td class="d-flex align-items-center">
                                        <a href="{{ route('admin.main-page.recommendations.edit', $recommendation->id) }}" class="btn btn-success" style="margin-right: 10px;">
                                            {{__('Редактировать')}}
                                        </a>
                                        <form action="{{ route('admin.main-page.recommendations.destroy', $recommendation->id) }}" method="POST">
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

