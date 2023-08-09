@extends('layout.master')

@section('content')
  @include('admin.partials.breadcrumb', ['subPage'=>'Изменить', 'page'=>'Новости', 'pageUrl'=>route('admin.posts.index')])

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Изменения новости</h6>
          <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="forms-sample">
            @csrf
            @method('PUT')
            @include('admin.posts._form')
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('custom-scripts')
    <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('body', {
            filebrowserUploadUrl: "{{ route('admin.post.storeImage', ['_token' => csrf_token() ]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endpush