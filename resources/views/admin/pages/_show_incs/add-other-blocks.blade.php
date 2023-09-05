<div class="raw">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title"> {{__('Добавьте другие блоки')}} </h6>
            </div>
            <div class="card-body">

                {{-- Info Block Start --}}
                <div class="d-flex justify-content-between">
                    <h6 class="mb-1"> {{__('Добавить информационный блок')}} </h6>

                    @livewire('update-info-order-id', ['id' => $page->id])

                    <div>
                        @if(count($page->infos) > 0)
                            <a href="{{ route('admin.infos.show', ['id' => $page->id]) }}"
                               class="btn btn-primary"> {{ __('Посмотреть') }} </a>
                        @endif

                        @if($page->infos->isEmpty())
                            <a href="{{ route('admin.infos.create', ['id' => $page->id]) }}"
                               class="btn btn-success">{{ __('Добавить') }}</a>
                        @else
                            <button type="button" class="btn btn-secondary" disabled> {{ __('Добавить') }}</button>
                        @endif
                    </div>
                </div>
                {{-- Info Block End --}}

                <hr>

                {{-- Comments Block Start --}}
                <div class="d-flex justify-content-between">
                    <h6 class="mb-1"> {{__('Добавить блок комментариев')}} </h6>

                    @livewire('update-comment-order-id', ['id' => $page->id])

                    <div>
                        @if(count($page->comments) > 0)
                            <a href="{{ route('admin.comments.show', ['id' => $page->id]) }}"
                           class="btn btn-primary"> {{ __('Посмотреть') }} </a>
                        @endif

                        <a href="{{ route('admin.comments.create', ['id' => $page->id]) }}"
                           class="btn btn-success">{{ __('Добавить') }}</a>
                    </div>
                </div>
                {{-- Comments Block End --}}

                <hr>

                {{-- OurClients Block Start --}}
                <div class="d-flex justify-content-between">
                    <h6 class="mb-1"> {{__('Добавить блок Наши клиенты')}} </h6>

                    @livewire('update-our-client-order-id', ['id' => $page->id])

                    <div>
                        @if(count($page->ourClients) > 0 || count($page->ourClientsLogo) > 0)
                            <a href="{{ route('admin.clients.show', ['id' => $page->id]) }}"
                           class="btn btn-primary"> {{ __('Посмотреть') }} </a>
                        @endif

                        <a href="{{ route('admin.clients.create', ['id' => $page->id]) }}"
                           class="btn btn-success"> {{ __('Добавить') }} </a>
                    </div>
                </div>
                {{-- OurClients Block End --}}

                <hr>

                {{-- Text Block Start --}}
                <div class="d-flex justify-content-between">
                    <h6 class="mb-1"> {{__('Добавить текстовый блок')}} </h6>

                    @livewire('update-text-block-order-id', ['id' => $page->id])

                    <div>
                        @if(count($page->textBlocks) > 0)
                            <a href="{{ route('admin.texts.show', ['id' => $page->id]) }}"
                               class="btn btn-primary"> {{ __('Посмотреть') }} </a>
                        @endif

                        <a href="{{ route('admin.texts.create', ['id' => $page->id]) }}" class="btn btn-success">{{ __('Добавить') }}</a>
                    </div>
                </div>
                {{-- Text Block End --}}

                <hr>

                {{-- Checkbox Block Start --}}
                <div class="d-flex justify-content-between">
                    <h6 class="mb-1"> {{__('Добавить блок чечкбокса')}} </h6>

                    @livewire('update-checkbox-block-order-id', ['id' => $page->id])

                    <div>
                        @if(count($page->checkBoxes) > 0)
                            <a href="{{ route('admin.checkbox.show', ['id' => $page->id]) }}"
                           class="btn btn-primary"> {{ __('Посмотреть') }} </a>
                        @endif

                        <a href="{{ route('admin.checkbox.create', ['id' => $page->id]) }}"
                           class="btn btn-success"> {{ __('Добавить') }} </a>
                    </div>
                </div>
                {{-- Checkbox Block End --}}

                <hr>

                {{-- Gallery Block Start --}}
                <div class="d-flex justify-content-between">
                    <h6 class="mb-1"> {{__('Добавить блок Галерея')}} </h6>

                    @livewire('update-gallery-order-id', ['id' => $page->id])

                    <div>
                        @if(count($page->galleries) > 0)
                            <a href="{{ route('admin.gallery.show', ['gallery' => $page->id]) }}"
                               class="btn btn-primary"> {{ __('Посмотреть') }} </a>
                        @endif

                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#addGallery">{{ __('Добавить') }}
                        </button>
                    </div>
                </div>
                @include('admin.pages.gallery.create')
                {{-- Gallery Block End --}}

                <hr>

                {{-- VideoPlayer Block Start --}}
                <div class="d-flex justify-content-between">
                    <h6 class="mb-1"> {{__('Добавить блок видео')}} </h6>

                    @livewire('update-video-player-order-id', ['id' => $page->id])

                    <div>
                        @if(count($page->videoPlayers) > 0)
                            <a href="{{ route('admin.videos.show', ['id' => $page->id]) }}"
                               class="btn btn-primary"> {{ __('Посмотреть') }} </a>
                        @endif

                        @if($page->videoPlayers->isEmpty())
                            <a href="{{ route('admin.videos.create', ['id' => $page->id]) }}"
                               class="btn btn-success">{{ __('Добавить') }}</a>
                        @else
                            <button type="button" class="btn btn-secondary" disabled> {{ __('Добавить') }}</button>
                        @endif
                    </div>
                </div>
                {{-- VideoPlayer Block End --}}

                <hr>

                {{-- DirectSpeech Block Start --}}
                <div class="d-flex justify-content-between">
                    <h6 class="mb-1"> {{__('Добавить блок прямой речи')}} </h6>

                    @livewire('update-direct-speech-order-id', ['id' => $page->id])

                    <div>
                        @if(count($page->directSpeeches) > 0)
                            <a href="{{ route('admin.direct_speech.show', ['id' => $page->id]) }}"
                           class="btn btn-primary"> {{ __('Посмотреть') }} </a>
                        @endif

                        @if($page->directSpeeches->isEmpty())
                            <a href="{{ route('admin.direct_speech.create', ['id' => $page->id]) }}"
                               class="btn btn-success"> {{ __('Добавить') }} </a>
                        @else
                            <button type="button" class="btn btn-secondary" disabled> {{ __('Добавить') }}</button>
                        @endif
                    </div>
                </div>
                {{-- DirectSpeech Block End --}}

                <hr>

                {{-- Appeals Block Start --}}
                <div class="d-flex justify-content-between">
                    <h6 class="mb-1"> {{__('Добавить блок заявки')}} </h6>

                    @livewire('update-appeal-order-id', ['id' => $page->id])

                    <div>
                        @if(count($page->appeals) > 0)
                            <a href="{{ route('admin.appeals.show', ['id' => $page->id]) }}"
                               class="btn btn-primary"> {{ __('Посмотреть') }} </a>
                        @endif

                        @if($page->appeals->isEmpty())
                            <a href="{{ route('admin.appeals.create', ['id' => $page->id]) }}"
                               class="btn btn-success"> {{ __('Добавить') }} </a>
                        @else
                            <button type="button" class="btn btn-secondary" disabled> {{ __('Добавить') }}</button>
                        @endif
                    </div>
                </div>
                {{-- Appeals Block End --}}

                <hr>

                {{-- Recommendation Block Start --}}
                <div class="d-flex justify-content-between">
                    <h6 class="mb-1"> {{__('Добавить блок Рекомендации')}} </h6>

                    @livewire('update-recommendation-block-order-id', ['id' => $page->id])

                    <div>
                        @if(count($page->recommendationBlocks) > 0)
                            <a href="{{ route('admin.recommendation-block.show', ['id' => $page->id]) }}"
                           class="btn btn-primary"> {{ __('Посмотреть') }} </a>
                        @endif

                        @if($page->recommendationBlocks->isEmpty())
                            <a href="{{ route('admin.recommendation-block.create', ['id' => $page->id]) }}"
                               class="btn btn-success"> {{ __('Добавить') }} </a>
                        @else
                            <button type="button" class="btn btn-secondary" disabled> {{ __('Добавить') }}</button>
                        @endif
                    </div>
                </div>
                {{-- Recommendation Block End --}}

            </div>
        </div>
    </div>
</div>
