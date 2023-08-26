{{--<div class="raw">--}}
{{--    <div class="d-flex justify-content-evenly flex-wrap">--}}
{{--        @foreach ($directSpeeches as $directSpeech)--}}
{{--            <div class="col-5">--}}
{{--                <div class="card mt-3">--}}
{{--                    <div class="card-header">--}}
{{--                        <div class="card-title">--}}
{{--                            <h6>{{__('Блок прямой речи')}} {{ $loop->iteration }}</h6>--}}
{{--                            <form action="{{ route('admin.direct_speech.destroy', $directSpeech->id) }}"--}}
{{--                                  method="POST">--}}
{{--                                @csrf--}}
{{--                                @method('DELETE')--}}
{{--                                <button type="submit" class="btn btn-danger btn-sm float-end ms-2">--}}
{{--                                    {{ __('Удалить') }}--}}
{{--                                </button>--}}
{{--                            </form>--}}
{{--                            <a href="{{ route('admin.direct_speech.edit', $directSpeech->id) }}"--}}
{{--                               class="btn btn-success btn-sm float-end text-capitalize">{{ __('Редактировать') }}</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="example">--}}
{{--                            <div>--}}
{{--                                <h6> {{ __('Полное имя') }} </h6>--}}
{{--                                <p class="mb-1"> {!! $directSpeech->translatable()->full_name !!} </p>--}}
{{--                            </div>--}}

{{--                            <hr>--}}

{{--                            <div>--}}
{{--                                <h6> {{ __('позиция') }} </h6>--}}
{{--                                <p class="mb-1"> {!! $directSpeech->translatable()->position !!} </p>--}}
{{--                            </div>--}}

{{--                            <hr>--}}

{{--                            <div>--}}
{{--                                <h6> {{ __('Текст') }} </h6>--}}
{{--                                <p class="mb-1"> {!! $directSpeech->translatable()->text !!} </p>--}}
{{--                            </div>--}}

{{--                            <hr>--}}

{{--                            <div class="me-3">--}}
{{--                                <h6 class="mb-1">{{ __('Логотип') }}</h6>--}}
{{--                                <img src="{{ asset(direct_speech_file_path().$directSpeech->logo) }}" alt=""--}}
{{--                                     width="200">--}}
{{--                            </div>--}}

{{--                            <hr>--}}

{{--                            <div class="me-3">--}}
{{--                                <h6 class="mb-1">{{ __('Изображение') }}</h6>--}}
{{--                                <img src="{{ asset(direct_speech_file_path().$directSpeech->image) }}" alt=""--}}
{{--                                     width="200">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--</div>--}}
