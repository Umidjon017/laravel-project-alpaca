<?php

use App\Models\Admin\Comment;
use App\Models\Admin\DirectSpeech;
use App\Models\Admin\Gallery;
use App\Models\Admin\InfoBlock;
use App\Models\Admin\OurClientLogo;
use App\Models\Admin\Page;
use App\Models\Admin\VideoPlayer;
use App\Models\Front\Banner;
use App\Models\Front\ForDoctor;
use App\Models\Front\ForIt;
use App\Models\Front\ForLeader;
use App\Models\Front\ForMarketology;

if(!function_exists('page_file_path')) {

    function page_file_path(): string
    {
        return '/' . Page::FILE_PATH;
    }
}

if(!function_exists('gallery_file_path')) {

    function gallery_file_path(): string
    {
        return '/' . Gallery::FILE_PATH;
    }
}

if(!function_exists('info_file_path')) {

    function info_file_path(): string
    {
        return '/' . InfoBlock::FILE_PATH;
    }
}

if(!function_exists('comment_file_path')) {

    function comment_file_path(): string
    {
        return '/' . Comment::FILE_PATH;
    }
}

if(!function_exists('videos_file_path')) {

    function videos_file_path(): string
    {
        return '/' . VideoPlayer::FILE_PATH;
    }
}

if(!function_exists('clients_logo_file_path')) {

    function clients_logo_file_path(): string
    {
        return '/' . OurClientLogo::FILE_PATH;
    }
}

if(!function_exists('direct_speech_file_path')) {

    function direct_speech_file_path(): string
    {
        return '/' . DirectSpeech::FILE_PATH;
    }
}

if(!function_exists('banner_file_path')) {

    function banner_file_path(): string
    {
        return '/' . Banner::FILE_PATH;
    }
}

if(!function_exists('doctors_file_path')) {

    function doctors_file_path(): string
    {
        return '/' . ForDoctor::FILE_PATH;
    }
}

if(!function_exists('leaders_file_path')) {

    function leaders_file_path(): string
    {
        return '/' . ForLeader::FILE_PATH;
    }
}

if(!function_exists('it_file_path')) {

    function it_file_path(): string
    {
        return '/' . ForIt::FILE_PATH;
    }
}

if(!function_exists('marketology_file_path')) {

    function marketology_file_path(): string
    {
        return '/' . ForMarketology::FILE_PATH;
    }
}
