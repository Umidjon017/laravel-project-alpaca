<!-- For Leader Start -->
<div class="for__card for2">
    @foreach($leaders as $leader)
    <div class="for2__left">
        {!! $leader->translatable()->body !!}
    </div>
    <div class="for2__right">
        <p class="for__title f2"> {!! $leader->translatable()->title !!} </p>
        <p class="for__subtitle">
            {!! $leader->translatable()->description !!}
        </p>
        <a href="{{ $leader->link }}" class="for2__btn">Подробнее</a>
    </div>
    <div class="for2__right_img">
        <img src="{{asset(leaders_file_path() . $leader->image)}}" alt="">
    </div>
    @endforeach
</div>
<!-- For Leader End -->
