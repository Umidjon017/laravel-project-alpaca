
<li class="nav__li nav__dropdown">
    <span class="nav__dropdown__open">
      <a href="{{route('home.page', $item->link)}}"> {!! $item->translatable()->menu_title !!} </a>
      @if($item->children->count() > 0)
            <img src="{{ asset('front/assets/image/arrows/arrow_bottom.png') }}" alt="">
      @endif
    </span>
    @if($item->children->count() > 0)
    <ul class="nav__dropdown__menu">
        @foreach($item->children as $subItem)
{{--            @include('front.menus.submenu', ['item' => $subItem])--}}
            <li>
                <a href="{{route('home.page', $subItem->link)}}"> {!! $subItem->translatable()->menu_title !!} </a>
            </li>
        @endforeach
    </ul>
    @endif
</li>
