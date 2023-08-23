
<!-- menus/index2.blade.php -->
@foreach ($menus as $menu)
{{--    <h2>{{ $menu->menu_title }}</h2>--}}
    <ul>
        @foreach ($menu->parent as $menuItem)
            @if($menuItem->parent_id == 0)
                @include('front.menus.submenu', ['item' => $menuItem])
            @endif
        @endforeach
    </ul>
@endforeach
