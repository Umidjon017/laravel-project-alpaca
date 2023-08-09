@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet"/>
@endpush

@section('content')

  @include('admin.partials.breadcrumb', ['page'=>'Проекты'])

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          <h6 class="card-title">Проекты</h6>
          <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Создать</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="dataTableExample" class="table">
              <thead>
              <tr>
                <th>T/R</th>
                <th>Название</th>
                <th>Фото</th>
                <th>Дата создания</th>
                <th>Действия</th>
              </tr>
              </thead>
              <tbody>
              @foreach($projects as $project)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>
                   {{ $project->getTranslatedAttributes(session('locale_id'))->name ?? 'no name' }}
                  </td>
                  <td><img src="{{ asset(project_file_path().$project->card_image) }}" alt="" width="200"></td>
                  <td>{{ $project->created_at->format('d.m.Y / H:i') }}</td>
                  <td class="d-flex align-items-center">
                    <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-primary" style="margin-right: 10px;">
                      Посмотреть
                    </a>
                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-success" style="margin-right: 10px;">
                      Редактировать
                    </a>
                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
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
