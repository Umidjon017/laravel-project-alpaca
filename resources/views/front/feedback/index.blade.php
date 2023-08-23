@extends('layout.master')

@section('content')

    @include('admin.partials.breadcrumb', ['page'=>'Отзывы наших клиентов'])

    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title">{{ __('Отзывы наших клиентов страницу') }}</h6>
                        <a href="{{ route('feedback.create') }}" class="btn btn-success"> {{ __('Добавить') }}</a>
                    </div>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th class="text-start"> # </th>
                                <th> {{ __('Изображение') }} </th>
                                <th> {{ __('ФИО') }} </th>
                                <th> {{ __('Текст') }} </th>
                                <th> {{ __('Позиция') }} </th>
                                <th class="w-25"> {{ __('Действие') }} </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($feedbacks as $feedback)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td><img src="{{asset(feedback_file_path() . $feedback->image)}}" alt="Feedback image" width="100"> </td>
                                    <td> {!! $feedback->getTranslatedAttributes(session('locale_id'))->full_name ?? 'No name' !!} </td>
                                    <td> {!! $feedback->getTranslatedAttributes(session('locale_id'))->text ?? 'No text' !!} </td>
                                    <td> {!! $feedback->getTranslatedAttributes(session('locale_id'))->position ?? 'No position' !!} </td>
                                    <td class="d-flex align-items-center">
                                        <a href="{{ route('feedback.edit', $feedback->id) }}" class="btn btn-success" style="margin-right: 10px;">
                                            {{__('Редактировать')}}
                                        </a>
                                        <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST">
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

