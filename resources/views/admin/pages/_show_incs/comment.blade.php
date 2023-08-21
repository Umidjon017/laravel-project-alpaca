<div class="raw">
    <div class="d-flex justify-content-evenly flex-wrap">
        @foreach ($comments as $comment)
            <div class="col-5">
                <div class="card mt-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h6> {{ __('Блок комментариев') }} {{ $loop->iteration }}</h6>
                            <form action="{{ route('admin.comments.destroy', $comment->id) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm float-end ms-2">
                                    {{ __('Удалить') }}
                                </button>
                            </form>
                            <a href="{{ route('admin.comments.edit', $comment->id) }}"
                               class="btn btn-success btn-sm float-end text-capitalize">{{ __('Редактировать') }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="example">
                            <div>
                                <h6> {{ __('Полное имя') }} </h6>
                                <p class="mb-1"> {!! $comment->getTranslatedAttributes(session('locale_id'))->full_name !!} </p>
                            </div>

                            <hr>

                            <div>
                                <h6> {{ __('позиция') }} </h6>
                                <p class="mb-1"> {!! $comment->getTranslatedAttributes(session('locale_id'))->position !!} </p>
                            </div>

                            <hr>

                            <div>
                                <h6> {{ __('Текст') }} </h6>
                                <p class="mb-1"> {!! $comment->getTranslatedAttributes(session('locale_id'))->text !!} </p>
                            </div>

                            <hr>

                            <div class="me-3">
                                <h6 class="mb-1">{{ __('Логотип') }}</h6>
                                <img src="{{ asset(comment_file_path().$comment->logo) }}" alt=""
                                     width="200">
                            </div>

                            <hr>

                            <div class="me-3">
                                <h6 class="mb-1">{{ __('Изображение') }}</h6>
                                <img src="{{ asset(comment_file_path().$comment->image) }}" alt=""
                                     width="200">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
