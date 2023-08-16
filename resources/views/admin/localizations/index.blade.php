@extends('layout.master')

@section('content')

    @include('admin.partials.breadcrumb', ['page'=>'Localizations'])

    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title">{{ __('Languages table') }}</h6>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addLanguage">Add</button>
                    </div>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th class="text-start"> # </th>
                                <th> {{ __('Name') }} </th>
                                <th class="w-25"> {{ __('Action') }} </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($localizations as $locale)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {{ $locale->name }} </td>
                                    <td class="d-flex align-items-center">
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editLanguage{{$locale->id}}">
                                            Edit
                                        </button>
                                        <form action="{{ route('admin.localizations.destroy', $locale->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>

                                @include('admin.localizations.edit')

                            @endforeach

                            @include('admin.localizations.create')

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
