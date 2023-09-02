@extends('layout.master')

@section('content')
    @include('admin.partials.breadcrumb', ['subPage'=>'Создать', 'page'=>'Для IT', 'pageUrl'=>route('admin.main-page.it.index')])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{__('Добавить Для IT')}}</h6>
                    <form action="{{ route('admin.main-page.it.store') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        @include('front.it._form')
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
