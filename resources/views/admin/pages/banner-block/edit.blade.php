@extends('layout.master')

@section('content')
    @include('admin.partials.breadcrumb', ['subPage'=>'Редактировать', 'page'=>'Баннеры', 'pageUrl'=>route('admin.pages.index')])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{__('Изменить блок баннеры')}}</h6>
                    <form action="{{ route('admin.banner-block.update', $bannerBlock->id) }}" enctype="multipart/form-data" method="POST" class="forms-sample">
                        @csrf
                        @method('PUT')
                        @include('admin.pages.banner-block._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('body');
    </script>
@endpush
