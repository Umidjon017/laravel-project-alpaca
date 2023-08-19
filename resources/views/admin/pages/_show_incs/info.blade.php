<div class="raw">
    <div class="d-flex justify-content-evenly">
        @foreach ($infos as $info)
            <div class="col-5">
                <div class="card mt-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h6>Info block {{ $loop->iteration }}</h6>
                            <form action="{{ route('admin.infos.destroy', $info->id) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm float-end ms-2">
                                    Delete
                                </button>
                            </form>
                            <a href="{{ route('admin.infos.edit', $info->id) }}"
                               class="btn btn-success btn-sm float-end text-capitalize">Edit</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="example">
                            <div>
                                <h6> Title </h6>
                                <p class="mb-1"> {!! $info->getTranslatedAttributes(session('locale_id'))->title !!} </p>
                            </div>

                            <hr>

                            <div>
                                <h6> Description </h6>
                                <p class="mb-1"> {!! $info->getTranslatedAttributes(session('locale_id'))->description !!} </p>
                            </div>

                            <hr>

                            <div>
                                <h6> Body </h6>
                                <p class="mb-1"> {!! $info->getTranslatedAttributes(session('locale_id'))->body !!} </p>
                            </div>

                            <hr>

                            <div>
                                <h6> Link </h6>
                                <p class="mb-1"> {!! $info->link !!} </p>
                            </div>

                            <hr>

                            <div class="me-3">
                                <h6 class="mb-1">Image</h6>
                                <img src="{{ asset(info_file_path().$info->image) }}" alt=""
                                     width="200">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
