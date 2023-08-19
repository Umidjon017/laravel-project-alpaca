<div class="raw">
    <div class="d-flex justify-content-evenly">
        @foreach ($texts as $text)
            <div class="col-5">
                <div class="card mt-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h6>Text block {{ $loop->iteration }}</h6>
                            <form action="{{ route('admin.texts.destroy', $text->id) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm float-end ms-2">
                                    Delete
                                </button>
                            </form>
                            <a href="{{ route('admin.texts.edit', $text->id) }}"
                               class="btn btn-success btn-sm float-end text-capitalize">Edit</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="example">
                            <div>
                                <h6> Text </h6>
                                <p class="mb-1"> {!! $text->getTranslatedAttributes(session('locale_id'))->text !!} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
