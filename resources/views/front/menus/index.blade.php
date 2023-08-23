@extends('layout.master')

@section('content')

    @include('admin.partials.breadcrumb', ['page'=>'Меню'])

    <div class="row">
        <div class="col-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title">{{ __('Страница главный меню') }}</h6>
                        <a href="{{ route('menus.create') }}" class="btn btn-success"> {{ __('Добавить') }}</a>
                    </div>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th class="text-start"> # </th>
                                <th> {{ __('Название меню') }} </th>
                                <th> {{ __('ID родителя') }} </th>
                                <th> {{ __('Статус') }} </th>
                                <th> {{ __('Действие') }} </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($menus as $menu)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {!! $menu->menu_title ?? 'No title' !!} </td>
                                    <td> {!! $menu->parent_id ?? 'No id' !!} </td>
                                    <td>
                                        @if ($menu->status == 1)
                                            <span class="badge bg-success fs-6"> {{ __('Активный') }} </span>
                                        @else
                                            <span class="badge bg-danger"> {{ __('Неактивный') }} </span>
                                        @endif
                                    </td>
                                    <td class="d-flex align-items-center">
                                        <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-success" style="margin-right: 10px;">
                                            {{__('Редактировать')}}
                                        </a>
                                        <form action="{{ route('menus.destroy', $menu->id) }}" method="POST">
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
