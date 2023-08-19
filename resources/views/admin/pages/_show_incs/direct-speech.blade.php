<div class="raw">
    <div class="d-flex justify-content-evenly flex-wrap">
        @foreach ($directSpeeches as $directSpeech)
            <div class="col-5">
                <div class="card mt-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h6>Direct Speech block {{ $loop->iteration }}</h6>
                            <form action="{{ route('admin.direct_speech.destroy', $directSpeech->id) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm float-end ms-2">
                                    Delete
                                </button>
                            </form>
                            <a href="{{ route('admin.direct_speech.edit', $directSpeech->id) }}"
                               class="btn btn-success btn-sm float-end text-capitalize">Edit</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="example">
                            <div>
                                <h6> Full name </h6>
                                <p class="mb-1"> {!! $directSpeech->getTranslatedAttributes(session('locale_id'))->full_name !!} </p>
                            </div>

                            <hr>

                            <div>
                                <h6> Position </h6>
                                <p class="mb-1"> {!! $directSpeech->getTranslatedAttributes(session('locale_id'))->position !!} </p>
                            </div>

                            <hr>

                            <div>
                                <h6> Text </h6>
                                <p class="mb-1"> {!! $directSpeech->getTranslatedAttributes(session('locale_id'))->text !!} </p>
                            </div>

                            <hr>

                            <div class="me-3">
                                <h6 class="mb-1">Logo</h6>
                                <img src="{{ asset(direct_speech_file_path().$directSpeech->logo) }}" alt=""
                                     width="200">
                            </div>

                            <hr>

                            <div class="me-3">
                                <h6 class="mb-1">Image</h6>
                                <img src="{{ asset(direct_speech_file_path().$directSpeech->image) }}" alt=""
                                     width="200">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
