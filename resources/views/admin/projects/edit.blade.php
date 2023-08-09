@extends('layout.master')

@section('content')
    @include('admin.partials.breadcrumb', ['subPage'=>'Изменить', 'page'=>'Проектов', 'pageUrl'=>route('admin.projects.index')])
       
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Изменения проектов</h6>
                    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                        @csrf
                        @method('PUT')
                        @include('admin.projects._form')
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
