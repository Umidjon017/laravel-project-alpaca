@extends('layout.master')

@push('plugin-styles')
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/select2.min.css')}}">
@endpush

@section('content')
    @include('admin.partials.breadcrumb', ['subPage'=>'Создать', 'page'=>'Меню', 'pageUrl'=>route('admin.menus.index')])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{__('Добавить Меню')}}</h6>
                    <form action="{{ route('admin.menus.store') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        @include('front.menus._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script src="{{ asset('assets/js/select2.js') }}"></script>
@endpush

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
@endpush
