<!-- Partnyors Start -->
<div class="partnyors__container">
    @foreach($partners as $partner)
    <p class="partnyors__title">{{ $partner->translatable()->title }}</p>
    <p class="partnyors__subtitle">{{ $partner->translatable()->description }}</p>
    @endforeach
    <div class="partnyors">
        @foreach($partner_logos as $logo)
            <a href="{{ $logo->link }}">
                <img src="{{asset(partners_file_path() . $logo->logo)}}" alt="">
            </a>
        @endforeach
    </div>
</div>
<!-- Partnyors End -->
