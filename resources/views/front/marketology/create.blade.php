@extends('layout.master')

@section('content')
    @include('admin.partials.breadcrumb', ['subPage'=>'Создать', 'page'=>'Для маркетолога', 'pageUrl'=>route('admin.marketology.index')])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{__('Добавить Для маркетолога')}}</h6>
                    <form action="{{ route('admin.marketology.store') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        @include('front.marketology._form')
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
