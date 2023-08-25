@extends('layout.master')

@section('content')
    @include('admin.partials.breadcrumb', ['subPage'=>'Создать', 'page'=>'Страницы', 'pageUrl'=>route('admin.pages.index')])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{__('Добавить видеоплеер')}}</h6>
                    <form action="{{ route('admin.videos.store') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                        @csrf
                        @include('admin.pages.videos._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
