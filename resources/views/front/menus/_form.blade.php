<div class="raw">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <ul class="nav nav-tabs " id="myTab" role="tablist">
                    @foreach($localizations as $localization)
                        <li class="nav-item">
                            <a class="nav-link @if($loop->first) active @endif" id="{{ $localization->name }}-tab" data-bs-toggle="tab" data-bs-target="#{{ $localization->name }}" role="tab" aria-controls="{{ $localization->name }}" aria-selected="true">
                                {{ strtoupper($localization->name) }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content border border-top-0 p-3" id="myTabContent">
                    @foreach ($localizations as $locale)
                        <div class="tab-pane fade @if($loop->first) show active @endif" id="{{ $locale->name }}" role="tabpanel" aria-labelledby="{{$locale->name}}-tab">
                            <div class="mt-3">
                                <label class="form-label" for="menu_title"> {{ __('Название меню') }} (*) </label>
                                <input type="text" id="menu_title" name="translations[{{ $locale->id }}][menu_title]" class="form-control @error('translations.*.menu_title') is-invalid @enderror" value="{{ old('translation.1.menu_title') ?? (isset($menu) ? $menu->getTranslatedAttributes($locale->id)->menu_title : '') }}" required/>
                                @error('menu_title')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            @isset($menu)
                                <input type="hidden" name="translations[{{ $locale->id }}][id]" value="{{ $menu->getTranslatedAttributes($locale->id)->id }}" />
                            @endisset
                        </div>
                    @endforeach
                </div>

                <div class="mt-3">
                    <label class="form-label" for="menu_title"> {{ __('Ссылка') }} (*) </label>
                    <input type="text" id="menu_title" name="link" class="form-control" value="{{ old('link') ?? (isset($menu) ? $menu->link : '') }}" required/>
                    @error('link')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mt-3">
                    <label class="form-label">{{ __('Соединение с меню') }}</label>
                    <select name="parent_id" class="js-example-basic-single w-100" data-width="100%"  data-placeholder="Select menu">
                        <option value="0">Выберите menu</option>
                        @foreach($menus as $menuItem)
                            <option value="{{ $menuItem->id }}" {{ $menuItem->id == (isset($menu) ? $menu->parent_id : '')  ? 'selected' : '' }} >{{$menuItem->translatable()->menu_title}}</option>
                        @endforeach
                    </select>
                    @error('parent_id')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mt-3">
                    <label class="form-label" for="order_id"> {{ __('Порядковый номер') }} (*) </label>
                    <input type="number" id="order_id" name="order_id" class="form-control" value="{{ old('order_id') ?? (isset($menu) ? $menu->order_id : '') }}" required/>
                    @error('order_id')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mt-3">
                    <label class="form-label">{{__('Статус (*)')}}</label>
                    <select class="js-example-basic-single w-100" data-width="100%"  data-placeholder="Select menu" name="status">
                        <option value="1" @isset($menu) {{ $menu->status == 1 ? "selected" : '' }} @endisset>Активный</option>
                        <option value="0" @isset($menu) {{ $menu->status == 0 ? "selected" : '' }} @endisset>Неактивный</option>
                    </select>
                    @error('status')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <button type="submit" class="btn btn-primary me-2"> @if(isset($menu)) {{ __('Сохранить') }} @else {{ __('Добавить') }} @endif </button>
                </div>

            </div>
        </div>
    </div>
</div>
