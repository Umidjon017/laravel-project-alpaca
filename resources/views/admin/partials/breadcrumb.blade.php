<nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Главная</a></li>
      @isset($subPage)
      <li class="breadcrumb-item">
        <a href="{{ $pageUrl ?? '#' }}">{{ $page }}</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page"> {{ $subPage }} </li>
      @else
      <li class="breadcrumb-item active">{{ $page }}</li>
      @endisset
    </ol>
</nav>