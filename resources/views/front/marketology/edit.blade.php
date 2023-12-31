@extends('layout.master')

@section('content')
    @include('admin.partials.breadcrumb', ['subPage'=>'Редактировать', 'page'=>'Для маркетолога', 'pageUrl'=>route('admin.main-page.marketology.index')])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{__('Изменить блок Для маркетолога')}}</h6>
                    <form action="{{ route('admin.main-page.marketology.update', $marketology->id) }}" enctype="multipart/form-data" method="POST" class="forms-sample">
                        @csrf
                        @method('PUT')
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
