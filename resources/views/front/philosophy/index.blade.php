@extends('layout.master')

@section('content')

    @include('admin.partials.breadcrumb', ['page'=>'Наша философия'])

    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title">{{ __('Наша философия') }}</h6>
                        <a href="{{ route('admin.philosophy.create') }}" class="btn btn-success"> {{ __('Добавить') }}</a>
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
                            @foreach ($philosophies as $philosophy)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {!! $philosophy->getTranslatedAttributes(session('locale_id'))->title ?? 'No title' !!} </td>
                                    <td> {!! $philosophy->getTranslatedAttributes(session('locale_id'))->description ?? 'No Description' !!} </td>
                                    <td> {!! $philosophy->link ?? 'No links' !!} </td>
                                    <td class="d-flex align-items-center">
                                        <a href="{{ route('admin.philosophy.edit', $philosophy->id) }}" class="btn btn-success" style="margin-right: 10px;">
                                            {{__('Редактировать')}}
                                        </a>
                                        <form action="{{ route('admin.philosophy.destroy', $philosophy->id) }}" method="POST">
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

