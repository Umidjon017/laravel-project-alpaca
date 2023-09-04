@extends('layout.master')

@section('content')

    @include('admin.partials.breadcrumb', ['page'=>'Страницы'])

    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <h6 class="card-title">{{ __('Таблица страниц') }}</h6>
                    <a href="{{ route('admin.pages.create') }}" class="btn btn-success"> {{ __('Добавить') }} </a>
                  </div>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr class="text-center">
                          <th class="text-start"> # </th>
                          <th> {{ __('Заголовок') }} </th>
                          <th> {{ __('Слаг') }} </th>
                          <th class="w-25"> {{ __('Действие') }} </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($pages as $page)
                        <tr>
                          <td> {{ $loop->iteration }} </td>
                          <td> {!! $page->translatable()->title ?? 'No title' !!} </td>
                          <td> {!! $page->slug ?? 'No slug' !!} </td>
                          <td class="d-flex align-items-center">
                            <a href="{{ route('admin.pages.show', $page->id) }}" class="btn btn-primary" style="margin-right: 10px;">
                                {{ __('Посмотреть') }}
                            </a>
                            <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btn-warning" style="margin-right: 10px;">
                                {{ __('Редактировать') }}
                            </a>
                            <form action="{{ route('admin.pages.destroy', $page->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">{{ __('Удалить') }}</button>
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
