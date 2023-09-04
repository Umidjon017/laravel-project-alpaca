@extends('layout.master')

@section('content')

    @include('admin.partials.breadcrumb', ['page'=>'Заявки'])

    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title">{{ __('Заявки страницу') }}</h6>
                    </div>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th class="text-start"> # </th>
                                <th> {{ __('Электронная почта') }} </th>
                                <th> {{ __('Имя') }} </th>
                                <th> {{ __('Текст') }} </th>
                                <th> {{ __('Дата создания') }} </th>
                                <th> {{ __('Статус') }} </th>
                                <th class="w-25"> {{ __('Действие') }} </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($appeals as $appeal)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {!! $appeal->email ?? 'No email' !!} </td>
                                    <td> {!! $appeal->name ?? 'No name' !!} </td>
                                    <td> {!! $appeal->text ?? 'No text' !!} </td>
                                    <td> {{ $appeal->created_at->format('d.m.Y H:i') }} </td>
                                    <td>
                                        @if ($appeal->status == 1)
                                            <span class="badge bg-success fs-6"> {{ __('Активный') }} </span>
                                        @else
                                            <span class="badge bg-danger"> {{ __('Неактивный') }} </span>
                                        @endif
                                    </td>
                                    <td class="d-flex align-items-center">
                                        <a href="{{ route('admin.appeal-form.edit', $appeal->id) }}" class="btn btn-success" style="margin-right: 10px;">
                                            {{__('Редактировать')}}
                                        </a>
                                        <form action="{{ route('admin.appeal-form.destroy', $appeal->id) }}" method="POST">
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

                <div class="card-footer text-right">
                    <div class="d-flex justify-content-right pagination">
                        {!! $appeals->links() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

