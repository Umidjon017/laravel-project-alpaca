@extends('layout.master')

@section('content')
    @include('admin.partials.breadcrumb', ['subPage'=>'Создать', 'page'=>'Проекты', 'pageUrl'=>route('admin.pages.index')])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Add Appeals</h6>
                    <form action="{{ route('admin.appeals.store') }}" method="POST" class="forms-sample">
                        @csrf
                        @include('admin.pages.appeals._form')
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
