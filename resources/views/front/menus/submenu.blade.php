
<!-- menus/submenu.blade.php -->
<li>
    {{ $item->menu_title }}
    @if ($item->children->count() > 0)
        <ul>
            @foreach ($item->children as $subItem)
                @include('front.menus.submenu', ['item' => $subItem])
            @endforeach
        </ul>
    @endif
</li>
