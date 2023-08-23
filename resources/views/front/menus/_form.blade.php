<div class="raw">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="mt-3">
                    <label class="form-label" for="menu_title"> {{ __('Название меню') }} (*) </label>
                    <input type="text" id="menu_title" name="menu_title" class="form-control" @isset($menu) value="{{$menu->menu_title}}" @endisset required/>
                    @error('menu_title')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mt-3">
                    <label class="form-label">{{ __('Attach to menu') }}</label>
                    <select name="parent_id" class="js-example-basic-single w-100" data-width="100%"  data-placeholder="Select menu">
                        <option value="0">Выберите menu</option>
                        @foreach($menus as $menuItem)
                            <option value="{{ $menuItem->id }}" {{ $menuItem->id == $menu->parent_id ? 'selected' : '' }} >{{$menuItem->menu_title}}</option>
                        @endforeach
                    </select>
                    @error('parent_id')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mt-3">
                    <label class="form-label">{{__('Статус (*)')}}</label>
                    <select class="js-example-basic-single w-100" data-width="100%"  data-placeholder="Select menu" name="status">
                        <option value="1" @isset($menu) {{ $menu->status == 1 ? "selected" : '' }} @endisset>Active</option>
                        <option value="0" @isset($menu) {{ $menu->status == 0 ? "selected" : '' }} @endisset>Inactive</option>
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
