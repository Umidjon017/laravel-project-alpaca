@extends('layout.master')

@section('content')
    @include('admin.partials.breadcrumb', ['subPage'=>'Редактировать', 'page'=>'Заявки', 'pageUrl'=>route('admin.appeal_form.index')])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{__('Изменить блок заявки')}}</h6>
                    <form action="{{ route('admin.appeal_form.update', $appeal_form->id) }}" enctype="multipart/form-data" method="POST" class="forms-sample">
                        @csrf
                        @method('PUT')
                        @include('admin.appeal_form._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

