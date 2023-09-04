@extends('layout.master')

@section('content')
    @include('admin.partials.breadcrumb', ['subPage'=>'Создать', 'page'=>'Страницы', 'pageUrl'=>route('admin.pages.index')])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{__('Добавить правила и соглашение')}}</h6>
                    <form action="{{ route('admin.rules.store') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        @include('admin.pages.appeals.rules._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
