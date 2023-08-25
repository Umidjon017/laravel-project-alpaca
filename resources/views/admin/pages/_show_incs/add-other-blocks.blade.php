<div class="raw">
    <div class="col-6">
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="card-title"> {{__('Добавьте другие блоки')}} </h6>
            </div>
            <div class="card-body">

                <div class="d-flex justify-content-between">
                    <h6 class="mb-1"> {{__('Добавить информационный блок')}} </h6>
                    <a href="{{ route('admin.infos.create', $page->id) }}" class="btn btn-primary">{{ __('Добавить') }}</a>
                </div>

                <hr>

                <div class="d-flex justify-content-between">
                    <h6 class="mb-1"> {{__('Добавить блок комментариев')}} </h6>
                    <a href="{{ route('admin.comments.create', $page->id) }}"
                       class="btn btn-primary">{{ __('Добавить') }}</a>
                </div>

                <hr>

                <div class="d-flex justify-content-between">
                    <h6 class="mb-1"> {{__('Добавить блок Наши клиенты')}} </h6>
                    <a href="{{ route('admin.clients.create', $page->id) }}"
                       class="btn btn-primary"> {{ __('Добавить') }} </a>
                </div>

                <hr>

                <div class="d-flex justify-content-between">
                    <h6 class="mb-1"> {{__('Добавить текстовый блок')}} </h6>
                    <a href="{{ route('admin.texts.create', $page->id) }}" class="btn btn-primary">{{ __('Добавить') }}</a>
                </div>

                <hr>

                <div class="d-flex justify-content-between">
                    <h6 class="mb-1"> {{__('Добавить блок чечкбокса')}} </h6>
                    <a href="{{ route('admin.checkbox.create', $page->id) }}"
                       class="btn btn-primary"> {{ __('Добавить') }} </a>
                </div>

                <hr>

                <div class="d-flex justify-content-between">
                    <h6 class="mb-1"> {{__('Добавить блок Галерея')}} </h6>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addGallery">{{ __('Добавить') }}
                    </button>
                </div>
                @include('admin.pages.gallery.create')

                <hr>

                @if($videos->isEmpty())
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-1"> {{__('Добавить блок видео')}} </h6>
                        <a href="{{ route('admin.videos.create', $page->id) }}"
                           class="btn btn-primary">{{ __('Добавить') }}</a>
                    </div>

                    <hr>
                @else
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-1"> {{__('Добавить блок видеоплеера')}} </h6>
                        <button type="button" class="btn btn-secondary" disabled> {{ __('Добавить') }}</button>
                    </div>

                    <hr>
                @endif

                <div class="d-flex justify-content-between">
                    <h6 class="mb-1"> {{__('Добавить блок прямой речи')}} </h6>
                    <a href="{{ route('admin.direct_speech.create', $page->id) }}"
                       class="btn btn-primary"> {{ __('Добавить') }} </a>
                </div>

                <hr>

                <div class="d-flex justify-content-between">
                    <h6 class="mb-1"> {{__('Добавить блок заявки')}} </h6>
                    <a href="{{ route('admin.appeals.create', $page->id) }}"
                       class="btn btn-primary"> {{ __('Добавить') }} </a>
                </div>

                <hr>

                <div class="d-flex justify-content-between">
                    <h6 class="mb-1"> {{__('Добавить блок Рекомендации')}} </h6>
                    <a href="{{ route('admin.recommendation-block.create', $page->id) }}"
                       class="btn btn-primary"> {{ __('Добавить') }} </a>
                </div>

            </div>
        </div>
    </div>
</div>
