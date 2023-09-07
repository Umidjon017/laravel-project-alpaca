@extends('layout.master')

@section('content')

    @include('admin.partials.breadcrumb', ['page'=>'Profile'])

    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title">{{ __('Таблица администратора') }}</h6>
                    </div>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th class="text-start"> # </th>
                                <th> {{ __('Имя') }} </th>
                                <th> {{ __('Электронная почта') }} </th>
                                <th> {{ __('Создан') }} </th>
                                <th class="w-25"> {{ __('Действие') }} </th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> 1 </td>
                                    <td> {!! $user->name !!} </td>
                                    <td> {!! $user->email !!} </td>
                                    <td> {!! $user->created_at !!} </td>
                                    <td class="d-flex align-items-center">
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning" style="margin-right: 10px;">
                                            {{ __('Редактировать') }}
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
