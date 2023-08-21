@extends('layout.master')

@section('content')

    @include('admin.partials.breadcrumb', ['page'=>'Appeals'])

    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title">{{ __('Appeals table') }}</h6>
                    </div>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th class="text-start"> # </th>
                                <th> {{ __('Title') }} </th>
                                <th> {{ __('Description') }} </th>
                                <th class="w-25"> {{ __('Action') }} </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($appeals as $appeal)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {!! $appeal->getTranslatedAttributes(session('locale_id'))->title ?? 'No title' !!} </td>
                                    <td> {!! $appeal->getTranslatedAttributes(session('locale_id'))->description ?? 'No Description' !!} </td>
                                    <td class="d-flex align-items-center">
                                        <a href="{{ route('admin.appeals.edit', $appeal->id) }}" class="btn btn-success" style="margin-right: 10px;">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.appeals.destroy', $appeal->id) }}" method="POST">
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

