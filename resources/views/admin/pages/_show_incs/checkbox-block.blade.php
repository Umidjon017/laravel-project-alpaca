<div class="raw">
    <div class="d-flex justify-content-evenly flex-wrap">
        @foreach ($checkboxBlocks as $checkboxBlock)
            <div class="col-5">
                <div class="card mt-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h6>Checkbox block {{ $loop->iteration }}</h6>
                            <form action="{{ route('admin.checkbox.destroy', $checkboxBlock->id) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm float-end ms-2">
                                    Delete
                                </button>
                            </form>
                            <a href="{{ route('admin.checkbox.edit', $checkboxBlock->id) }}"
                               class="btn btn-success btn-sm float-end text-capitalize">Edit</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="example">
                            <div>
                                <h6> Title </h6>
                                <p class="mb-1"> {!! $checkboxBlock->getTranslatedAttributes(session('locale_id'))->title !!} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>