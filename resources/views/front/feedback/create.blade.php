@extends('layout.master')

@section('content')
    @include('admin.partials.breadcrumb', ['subPage'=>'Создать', 'page'=>'Отзывы клиентов', 'pageUrl'=>route('feedback.index')])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{__('Добавить Отзывы наших клиентов')}}</h6>
                    <form action="{{ route('feedback.store') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                        @csrf
                        @include('front.feedback._form')
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
