@extends('layout.master')

@section('content')
    @include('admin.partials.breadcrumb', ['subPage'=>'Редактировать', 'page'=>'Страницы', 'pageUrl'=>route('admin.pages.index')])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title"> {{__('Изменить видеоплеер')}} </h6>
                    <form action="{{ route('admin.videos.update', $video->id) }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                        @csrf
                        @method('PUT')
                        @include('admin.pages.videos._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
