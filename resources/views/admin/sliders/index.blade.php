@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet"/>
  <style>
    .editBtn{
      margin-right: 10px;
    }
  </style>
@endpush

@section('content')
  @include('admin.partials.breadcrumb', ['page'=>'Слайдеры'])
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          <h6 class="card-title">Слайдеры</h6>
          <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">Создать</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="dataTableExample" class="table">
              <thead>
              <tr>
                <th>T/R</th>
                <th>Фото</th>
                <th>Ссылка</th>
                <th>Дата создания</th>
                <th>Действия</th>
              </tr>
              </thead>
              <tbody>
              @foreach($sliders as $slider)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>
                    <img src="{{ slider_file_path().$slider->getTranslatedAttributes(session('locale_id'))->image ?? 'no image' }}" alt="" width="200">
                  </td>
                  <td>{{ $slider->getTranslatedAttributes(session('locale_id'))->url ?? 'URL не задан' }}</td>
                  <td>{{ $slider->created_at->format('d.m.Y / H:i') }}</td>
                  <td class="d-flex align-items-center">
                    <a href="{{ route('admin.sliders.edit', $slider->id) }}" class="btn btn-success editBtn">
                      Редактировать
                    </a>
                    <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST">
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
