@extends('layout.master')

@section('content')
  
  @include('admin.partials.breadcrumb', ['subPage'=>'Создать', 'page'=>'Слайдеры', 'pageUrl'=>route('admin.sliders.index')])
  
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">

          <h6 class="card-title">Создание слайдера</h6>
          <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
            @csrf
            @include('admin.sliders._form')
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
