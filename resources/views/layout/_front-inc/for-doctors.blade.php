<!-- For Doctors Start -->
<div class="for__card for1 for__one">
    @foreach($doctors as $doctor)
    <div class="for1__left">
        <p class="for__title f1">{!! $doctor->translatable()->title !!}</p>
        <p class="for__subtitle">
            {!! $doctor->translatable()->description !!}
        </p>
        <a href="{{ $doctor->link }}" class="for1__btn">{{ $doctor->translatable()->link_title }}</a>
    </div>
    <div class="for1__left_img">
        <img src="{{ asset(doctors_file_path() . $doctor->image) }}" alt="">
    </div>
    <div class="for1__right">
        {!! $doctor->translatable()->body !!}
    </div>
    @endforeach
</div>
<!-- For Doctors End -->
