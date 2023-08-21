<div class="raw">
    <div class="d-flex justify-content-evenly flex-wrap">
        @foreach ($appeals as $appeal)
            <div class="col-5">
                <div class="card mt-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h6>Appeals block {{ $loop->iteration }}</h6>
                            <form action="{{ route('admin.appeals.destroy', $appeal->id) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm float-end ms-2">
                                    Delete
                                </button>
                            </form>
                            <a href="{{ route('admin.appeals.edit', $appeal->id) }}"
                               class="btn btn-success btn-sm float-end text-capitalize">Edit</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="example">
                            <div>
                                <h6> Title </h6>
                                <p class="mb-1"> {!! $appeal->getTranslatedAttributes(session('locale_id'))->title !!} </p>
                            </div>

                            <hr>

                            <div>
                                <h6> Description </h6>
                                <p class="mb-1"> {!! $appeal->getTranslatedAttributes(session('locale_id'))->description !!} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>