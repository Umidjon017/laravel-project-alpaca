<div class="raw">
    <div class="d-flex justify-content-evenly">
        @foreach ($texts as $text)
            <div class="col-5">
                <div class="card mt-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h6>{{ __('Текстовый блок') }} {{ $loop->iteration }}</h6>
                            <form action="{{ route('admin.texts.destroy', $text->id) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm float-end ms-2">
                                    {{ __('Удалить') }}
                                </button>
                            </form>
                            <a href="{{ route('admin.texts.edit', $text->id) }}"
                               class="btn btn-success btn-sm float-end text-capitalize">{{ __('Редактировать') }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="example">
                            <div class="mb-3">
                                <h6> {{ __('Заголовок') }} </h6>
                                <p class="mb-1"> {!! $text->translatable()->title !!} </p>
                            </div>
                            <div class="mb-3">
                                <h6> {{ __('Текст') }} </h6>
                                <p class="mb-1"> {!! $text->translatable()->text !!} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
