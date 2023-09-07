<x-front-layout>

    <x-slot name="title">
        {{ __('Alpaca') }}
    </x-slot>

    <x-slot name="navbar">
        <!-- Navbar Start -->
        @include('layout._front-inc.navbar')
        <!-- Navbar End -->
    </x-slot>

    @for($i = 1; $i < 10; $i++)

        <!-- Banner Start -->
        @if(count($route->bannerBlocks) > 0)
            @if($i == $route->bannerBlocks->pluck('order_id')->toArray()[0])
                <div class="hero__container">
                    <div class="container">
                        <div class="hero">
                            @foreach($route->bannerBlocks as $bannerBlock)
                                <div class="hero__text">
                                    <h1 class="hero__title">
                                        {!! preg_replace('/медицинского/i', '<span>медицинского</span>', $bannerBlock->translatable()->title) !!}
                                    </h1>
                                    <p>
                                        {!! preg_replace('/К слову, alpaca - это не лама!/i', '<b>К слову, alpaca - это не лама!</b>', $bannerBlock->translatable()->description) !!}
                                    </p>
                                    <div class="hero__btn">
                                        <a href="{{ $bannerBlock->try_link }}">{{ $bannerBlock->translatable()->try_link_title }}</a>
                                        <a href="{{ $bannerBlock->more_link }}"> {{ $bannerBlock->translatable()->more_link_title }} </a>
                                    </div>
                                </div>
                                <div class="hero__img">
                                    <img src="{{asset(banner_block_file_path() . $bannerBlock->image)}}" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        @endif
        <!-- Banner End -->

        <!-- Info Start -->
        @if(count($route->infos) > 0)
            @if($i == $route->infos->pluck('order_id')->toArray()[0])
                <div class="for__card__container">
                    <!-- Dlya vracha Start -->
                    <div class="for__card for1 inner__for1">
                        @foreach($route->infos as $index => $info)
                            <div class="for1__left">
                                <p class="for__title f1">{!! $info->translatable()->title !!}</p>
                                <p class="for__subtitle">
                                    {!! $info->translatable()->description !!}
                                </p>
                                <a href="{{$info->link}}" class="for1__btn">{{ $info->translatable()->link_title }}</a>
                            </div>
                            <div class="for1__left_img">
                                <img src="{{asset(info_file_path().$info->image)}}" alt="">
                            </div>
                        @endforeach
                    </div>
                    <!-- Dlya vracha End -->
                </div>
            @endif
        @endif
        <!-- Info End -->

        <!-- Plyusi Start -->
        @if(count($route->textBlocks) > 0)
            @if($i == $route->textBlocks->pluck('order_id')->toArray()[0])
                <div class="plyusi">
                    @foreach($route->textBlocks as $index => $text)
                        <p class="plyusi__title">{!! $text->translatable()->title !!}</p>
                        <p class="plyusi__subtitle">{!! nl2br(strip_tags($text->translatable()->text)) !!}</p>
                    @endforeach
                </div>
            @endif
        @endif
        <!-- Plyusi End -->

        <!-- Plyusi Start -->
        @if(count($route->checkBoxes) > 0)
            @if($i == $route->checkBoxes->pluck('order_id')->toArray()[0])
                <div class="plyusi">
                    @foreach($route->checkBoxes as $index => $checkbox)
                        <p class="plyusi__item">
                            {!! $checkbox->translatable()->title !!}
                        </p>
                    @endforeach
                </div>
            @endif
        @endif
        <!-- Plyusi End -->

        <!-- Comments Start -->
        @if(count($route->comments) > 0)
            @if($i == $route->comments->pluck('order_id')->toArray()[0])
                <div class="comments__container">
                    <p class="comments__title">Отзывы наших клиентов</p>
                    <div class="comments">
                        <div dir="ltr" class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @foreach($route->comments as $index => $comment)
                                    <div class="swiper-slide">
                                        <div class="comment">
                                            <img src="{{ asset(comment_file_path() . $comment->logo) }}" alt="" class="comment__logo">
                                            <p class="comment__text">
                                                {!! $comment->translatable()->text !!}
                                            </p>
                                            <div class="comment__user">
                                                <img src="{{ asset(comment_file_path() . $comment->image) }}" alt="">
                                                <div class="comment__user__info">
                                                    <b class="comment__user__name">{!! $comment->translatable()->full_name !!}</b>
                                                    <p class="comment__user__company">{!! $comment->translatable()->position !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- <div class="swiper-pagination"></div> -->
                        </div>
                    </div>
                </div>
            @endif
        @endif
        <!-- Comments End -->

        <!-- Partnyors Start -->
        @if(count($route->ourClients) > 0 || count($route->ourClientsLogo) > 0)
            @if($i == $route->ourClients->pluck('order_id')->toArray()[0])
                <div class="partnyors__container">
                    @foreach($route->ourClients as $index => $client)
                    <p class="partnyors__title">{!! $client->translatable()->title !!}</p>
                    <p class="partnyors__subtitle">{!! $client->translatable()->description !!}</p>
                    @endforeach

                    <div class="partnyors">
                        @foreach($route->ourClientsLogo as $index => $logo)
                            <a href="{{$logo->link}}" target="_blank">
                                <img src="{{asset(clients_logo_file_path() . $logo->logo)}}" alt="">
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        @endif
        <!-- Partnyors End -->

        <!-- use_now Start -->
        @if(count($route->recommendationBlocks) > 0)
            @if($i == $route->recommendationBlocks->pluck('order_id')->toArray()[0])
                <div class="use__now">
                    @foreach($route->recommendationBlocks as $index => $recommend)
                    <div class="use__now__text">
                        <p class="use__now__title">
                            {!! $recommend->translatable()->title !!}
                        </p>
                        <p class="use__now__subtitle">
                            {!! $recommend->translatable()->description !!}
                        </p>
                        <a href="{{$recommend->link}}" class="use__now__btn">
                            {{ $recommend->translatable()->link_title }}
                        </a>
                    </div>
                    <div class="use__now__img">
                        <img src="{{ asset(recommendations_admin_file_path() . $recommend->image) }}" alt="">
                    </div>
                    @endforeach
                </div>
            @endif
        @endif
        <!-- use_now End -->

        <!-- Video player Start -->
        @if(count($route->videoPlayers) > 0)
            @if($i == $route->videoPlayers->pluck('order_id')->toArray()[0])
                <div class="video__container inner__container">
                    <div class="video-element">
                        @foreach($route->videoPlayers as $index => $player)
                            <div class="video-cover"><i class="fas fa-play"></i></div>
                            <video class="my-video" poster="{{asset(videos_file_path().$player->video_poster)}}">
                                <source src="{{$player->video_url}}">
                            </video>
                            <div class="control-box">
                                <button class="play-pause">
                                    <!-- <img src="./assets/image/play_icon.svg" alt=""> -->
                                    <i class="fas fa-play"></i>
                                </button>
                                <div class="completed-track"></div>
                                <input type="range" min="0" max="100" step="0.001" class="progress-slider" value="0">
                                <div class="time-duration">00:00/00:00</div>
                                <button class="full-screen"><i class="fas fa-expand"></i></button>
                                <button class="mute-button"><i class="fas fa-volume-up"></i></button>
                                <input type="range" min="0" max="1" step="0.1" class="volume-button" value="1" />
                                <div class="present-volume"></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endif
        <!-- Video player End -->

        <!-- one comment Start -->
        @if(count($route->directSpeeches) > 0)
            @if($i == $route->directSpeeches->pluck('order_id')->toArray()[0])
                <div class="comment__one inner__container">
                    @foreach($route->directSpeeches as $index => $speech)
                    <div class="comment__one__info">
                        <img src="{{ asset(direct_speech_file_path() . $speech->image) }}" alt="" class="comment__one__user">
                        <div>
                            <b class="comment__one__name">{!! $speech->translatable()->full_name !!}</b>
                            <p class="comment__one__company">{!! $speech->translatable()->position !!}</p>
                            <img src="{{ asset(direct_speech_file_path() . $speech->logo) }}" alt="" class="comment__one__logo">
                        </div>
                    </div>
                    <div class="comment__one__text">
                        {!! preg_replace(
                            '/способность эффективно управлять большим объемом информации./i',
                            '<span>способность эффективно управлять большим объемом информации.</span>',
                            $speech->translatable()->text)
                        !!}
                    </div>
                    @endforeach
                </div>
            @endif
        @endif
        <!-- one comment End -->

        <!-- inner Slider Start -->
        @if(count($route->galleries) > 0)
            @if($i == $route->galleries->pluck('order_id')->toArray()[0])
                <div class="inner__slider inner__container">
                    <div dir="ltr" class="swiper innerSwiper">
                        <div class="swiper-wrapper">
                            @foreach($route->galleries as $index => $gallery)
                            <div class="swiper-slide inner__slider__item">
                                <img src="{{ asset(gallery_file_path() . $gallery->image) }}" alt="">
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper__pagination">
                            <div class="swiper-pagination"></div>
                        </div>

                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            @endif
        @endif
        <!-- inner Slider End -->

        <!-- Contact Start -->
        @if(count($route->appeals) > 0)
            @if($i == $route->appeals->pluck('order_id')->toArray()[0])
                <div class="contact" id="appeals">
                    <div class="contact__text">
                        @foreach($route->appeals as $index => $appeal)
                        <p class="contact__title">
                            {!! $appeal->translatable()->title !!}
                        </p>
                        <p class="contact__subtitle">
                            {!! $appeal->translatable()->description !!}
                        </p>
                        @endforeach
                    </div>
                    <div class="contact__form">
                        <p class="form__title">{!! $appeal->translatable()->theme !!}</p>

                        @livewire('appeal-form')

                        @foreach($route->rules as $rule)
                        <p class="form__text">
                            <a href="{{ asset(rules_file_path().$rule->file_personal_data) }}">{!! $rule->translatable()->agreement_personal_data !!}</a>
                        </p> <br>


                        <p class="form__text">
                            <a href="{{ asset(rules_file_path().$rule->file_personal_data_policy) }}">{!! $rule->translatable()->agreement_personal_data_policy !!}</a>
                        </p>
                        @endforeach
                    </div>
                </div>
            @endif
        @endif
        <!-- Contact End -->

        <!-- Price Start -->
        @if(count($route->prices) > 0)
            @if($i == $route->prices->pluck('order_id')->toArray()[0])
                <div class="price__container">
                    <div class="price">
                        @foreach($route->prices as $index => $price)
                            @php
                                $excepted_options = explode(', ', $price->translatable()->excepted_options);
                                $ignored_options = explode(', ', $price->translatable()->ignored_options);
                            @endphp
                        <div class="price__card p_light">
                            <p class="price__title">
                                {!! $price->translatable()->title !!}
                                <img src="{{ asset(prices_file_path() . $price->icon) }}" alt="">
                            </p>
                            <div class="price__list">
                                @foreach($excepted_options as $exOption)
                                    <p class="price__item">{!! $exOption !!}</p>
                                @endforeach

                                @foreach($ignored_options as $ignOption)
                                    @if($ignOption != null)
                                        <p class="price__item price_no">{!! $ignOption !!}</p>
                                    @endif
                                @endforeach
                            </div>
                            <p class="price__money">{{ $price->price }}₽ <span>/ месяц</span></p>
                            <a href="#" class="price__btn">Купить</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endif
        <!-- Price End -->

    @endfor

    <x-slot name="footer">
        <!-- Footer Start -->
        @include('layout._front-inc.footer')
        <!-- Footer End -->
    </x-slot>

</x-front-layout>
