
<li class="nav__li nav__dropdown">
    <span class="nav__dropdown__open">
      <a href="{{ $item->link }}"> {!! $item->menu_title !!} </a>
      @if($item->children->count() > 0)
            <img src="{{ asset('front/assets/image/arrows/arrow_bottom.png') }}" alt="">
      @endif
    </span>
    @if($item->children->count() > 0)
    <ul class="nav__dropdown__menu">
        @foreach($item->children as $subItem)
{{--            @include('front.menus.submenu', ['item' => $subItem])--}}
            <li>
                <a href="{{ $subItem->link }}"> {!! $subItem->menu_title !!} </a>
            </li>
        @endforeach
    </ul>
    @endif
</li>
