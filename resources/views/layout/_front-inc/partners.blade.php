<!-- Partnyors Start -->
<div class="partnyors__container">
    <p class="partnyors__title">Уже протестировали и внедрили</p>
    <p class="partnyors__subtitle">Ведущие медицинские организации уже работают с нашей системой</p>
    <div class="partnyors">
        @foreach($partners as $partner)
            <a href="{{ $partner->link }}">
                <img src="{{asset(partners_file_path() . $partner->logo)}}" alt="">
            </a>
        @endforeach
    </div>
</div>
<!-- Partnyors End -->
