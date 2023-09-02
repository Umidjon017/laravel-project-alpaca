@extends('layout.master')

@section('content')
    @include('admin.partials.breadcrumb', ['subPage'=>'Редактировать', 'page'=>'Наши клиенты', 'pageUrl'=>route('admin.main-page.partner-logos.index')])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{__('Изменить Наши клиенты')}}</h6>
                    <form action="{{ route('admin.main-page.partner-logos.update', $partner_logo->id) }}" enctype="multipart/form-data" method="POST" class="forms-sample">
                        @csrf
                        @method('PUT')
                        @include('front.partner-logos._form')
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
