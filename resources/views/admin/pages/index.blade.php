@extends('layout.master')

@section('content')

    @include('admin.partials.breadcrumb', ['page'=>'Pages'])

    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <h6 class="card-title">{{ __('Pages table') }}</h6>
                    <a href="{{ route('admin.pages.create') }}" class="btn btn-success"> {{ __('Add') }} </a>
                  </div>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr class="text-center">
                          <th class="text-start"> # </th>
                          <th> {{ _('Title') }} </th>
                          <th> {{ _('Status') }} </th>
                          <th class="w-25"> {{ _('Action') }} </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($pages as $page)
                        <tr>
                          <td> {{ $loop->iteration }} </td>
                          <td> {{ $page->getTranslatedAttributes(session('locale_id'))->title ?? 'No title'}} </td>
                          <td>
                            @if ($page->status == true)
                            <span class="badge bg-success fs-6"> {{ __('Active') }} </span>
                            @else
                            <span class="badge bg-danger"> {{ __('Inactive') }} </span>
                            @endif
                          </td>
                          <td class="d-flex align-items-center">
                            <a href="{{ route('admin.pages.show', $page->slug) }}" class="btn btn-primary" style="margin-right: 10px;">
                              View
                            </a>
                            <a href="{{ route('admin.pages.edit', $page->slug) }}" class="btn btn-success" style="margin-right: 10px;">
                              Edit
                            </a>
                            <form action="{{ route('admin.pages.destroy', $page->slug) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Delete</button>
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
