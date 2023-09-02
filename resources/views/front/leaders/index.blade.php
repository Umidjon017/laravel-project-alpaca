@extends('layout.master')

@section('content')

    @include('admin.partials.breadcrumb', ['page'=>'Для руководителя'])

    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title">{{ __('Для руководителя страницу') }}</h6>
                        @if($leaders->isEmpty())
                            <a href="{{ route('admin.main-page.leaders.create') }}" class="btn btn-success"> {{ __('Добавить') }}</a>
                        @endif
                    </div>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th class="text-start"> # </th>
                                <th> {{ __('Заголовок') }} </th>
                                <th> {{ __('Описание') }} </th>
                                <th> {{ __('Контент') }} </th>
                                <th> {{ __('Ссылка') }} </th>
                                <th class="w-25"> {{ __('Действие') }} </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($leaders as $leader)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {!! $leader->translatable()->title ?? 'No title' !!} </td>
                                    <td> {!! $leader->translatable()->description ?? 'No Description' !!} </td>
                                    <td> {!! $leader->translatable()->body ?? 'No Description' !!} </td>
                                    <td> {!! $leader->link ?? 'No link' !!} </td>
                                    <td class="d-flex align-items-center">
                                        <a href="{{ route('admin.main-page.leaders.edit', $leader->id) }}" class="btn btn-success" style="margin-right: 10px;">
                                            {{__('Редактировать')}}
                                        </a>
                                        <form action="{{ route('admin.main-page.leaders.destroy', $leader->id) }}" method="POST">
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

