{{--<div class="raw">--}}
{{--    <div class="d-flex justify-content-evenly flex-wrap">--}}
{{--        @foreach ($recommendationBlocks as $recommend)--}}
{{--            <div class="col-5">--}}
{{--                <div class="card mt-3 me-3">--}}
{{--                    <div class="card-header">--}}
{{--                        <div class="card-title">--}}
{{--                            <h6> {{ __('Блок Рекомендации') }} {{ $loop->iteration }}</h6>--}}
{{--                            <form action="{{ route('admin.recommendation-block.destroy', $recommend->id) }}"--}}
{{--                                  method="POST">--}}
{{--                                @csrf--}}
{{--                                @method('DELETE')--}}
{{--                                <button type="submit" class="btn btn-danger btn-sm float-end ms-2">--}}
{{--                                    {{ __('Удалить') }}--}}
{{--                                </button>--}}
{{--                            </form>--}}
{{--                            <a href="{{ route('admin.recommendation-block.edit', $recommend->id) }}"--}}
{{--                               class="btn btn-success btn-sm float-end text-capitalize">{{ __('Редактировать') }}</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="example">--}}
{{--                            <div>--}}
{{--                                <h6> {{ __('Заголовок') }} </h6>--}}
{{--                                <p class="mb-1"> {!! $recommend->translatable()->title !!} </p>--}}
{{--                            </div>--}}

{{--                            <hr>--}}

{{--                            <div>--}}
{{--                                <h6> {{ __('Описание') }} </h6>--}}
{{--                                <p class="mb-1"> {!! $recommend->translatable()->description !!} </p>--}}
{{--                            </div>--}}

{{--                            <hr>--}}

{{--                            <div>--}}
{{--                                <h6> {{ __('Ссылка') }} </h6>--}}
{{--                                <p class="mb-1"> {!! $recommend->link !!} </p>--}}
{{--                            </div>--}}

{{--                            <hr>--}}

{{--                            <div class="me-3">--}}
{{--                                <h6 class="mb-1">{{ __('Изображение') }}</h6>--}}
{{--                                <img src="{{ asset(recommendations_admin_file_path().$recommend->image) }}" alt=""--}}
{{--                                     width="200">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--</div>--}}
