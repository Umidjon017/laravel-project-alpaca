@extends('layout.master')

@section('content')

    @include('admin.partials.breadcrumb', ['page'=>'Меню'])

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title">{{ __('Страница главный меню') }}</h6>
                        <a href="{{ route('admin.main-page.menus.create') }}" class="btn btn-success"> {{ __('Добавить') }}</a>
                    </div>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th class="text-start"> # </th>
                                <th> {{ __('Название меню') }} </th>
                                <th> {{ __('Соединение с меню') }} </th>
                                <th> {{ __('Порядковый номер') }} </th>
                                <th> {{ __('Ссылка') }} </th>
                                <th> {{ __('Статус') }} </th>
                                <th> {{ __('Действие') }} </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($menus as $menu)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {!! $menu->translatable()->menu_title ?? 'No title' !!} </td>
                                    <td class="d-flex flex-wrap">
                                        @foreach($menu->children as $child)
                                            <a href="{{ route('admin.main-page.menus.edit', $child->id) }}" class="badge bg-light text-dark m-1 fs-6"> {{ $child->translatable()->menu_title }} -> {{ $child->order_id }} </a>
                                        @endforeach
                                    </td>
                                    <td> {!! $menu->order_id ?? 'No id' !!} </td>
                                    <td> {!! $menu->link ?? 'No link' !!} </td>
                                    <td>
                                        @if ($menu->status == 1)
                                            <span class="badge bg-success fs-6"> {{ __('Активный') }} </span>
                                        @else
                                            <span class="badge bg-danger"> {{ __('Неактивный') }} </span>
                                        @endif
                                    </td>
                                    <td class="d-flex align-items-center">
                                        <a href="{{ route('admin.main-page.menus.edit', $menu->id) }}" class="btn btn-success" style="margin-right: 10px;">
                                            {{__('Редактировать')}}
                                        </a>
                                        <form action="{{ route('admin.main-page.menus.destroy', $menu->id) }}" method="POST">
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
