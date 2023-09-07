@extends('layout.master')

@section('content')
    @include('admin.partials.breadcrumb', ['subPage'=>'Редактировать', 'page'=>'Profile', 'pageUrl'=>route('admin.users.index')])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{__('Изменить учетные данные администратора')}}</h6>
                    <form action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data" method="POST" class="forms-sample">
                        @csrf
                        @method('PUT')
                        @include('admin.users._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

