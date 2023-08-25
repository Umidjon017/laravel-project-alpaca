<div class="raw">
    <div class="d-flex justify-content-evenly flex-wrap">
        @foreach ($clients as $client)
            <div class="col-3">
                <div class="card mt-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h6>{{ __('Блок Наши клиенты') }} {{ $loop->iteration }}</h6>
                            <form action="{{ route('admin.clients.destroy', $client->id) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm float-end ms-2">
                                    {{ __('Удалить') }}
                                </button>
                            </form>
                            <a href="{{ route('admin.clients.edit', $client->id) }}"
                               class="btn btn-success btn-sm float-end text-capitalize">{{ __('Редактировать') }}</a>
                            <a href="{{ route('admin.clients.show', $client->id) }}"
                               class="btn btn-primary btn-sm float-end text-capitalize me-2">{{ __('Посмотреть') }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="example">
                            <div>
                                <h6> {{ __('Заголовок') }} </h6>
                                <p class="mb-1"> {!! $client->translatable()->title !!} </p>
                            </div>

                            <hr>

                            <div>
                                <h6> {{ __('Описание') }} </h6>
                                <p class="mb-1"> {!! $client->translatable()->description !!} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
