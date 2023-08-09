@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet"/>
@endpush

@section('content')
  
  @include('admin.partials.breadcrumb', ['page'=>'Новости'])

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          <h6 class="card-title">Новости</h6>
          <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Создать</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="dataTableExample" class="table">
              <thead>
              <tr>
                <th>T/R</th>
                <th>Заголовок</th>
                <th>Фото</th>
                <th>Дата создания</th>
                <th>Действия</th>
              </tr>
              </thead>
              <tbody>
              @foreach($posts as $post)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>
                   {{ $post->getTranslatedAttributes(session('locale_id'))->title ?? 'no title' }}
                  </td>
                  <td><img src="{{ post_file_path().$post->image }}" alt="" width="200"></td>
                  <td>{{ $post->created_at->format('d.m.Y / H:i') }}</td>
                  <td class="d-flex align-items-center">
                    <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary" style="margin-right: 10px;">
                      Посмотреть
                    </a>
                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-success" style="margin-right: 10px;">
                      Редактировать
                    </a>
                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
