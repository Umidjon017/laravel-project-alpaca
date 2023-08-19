<?php

use App\Models\Comment;
use App\Models\DirectSpeech;
use App\Models\Gallery;
use App\Models\InfoBlock;
use App\Models\OurClient;
use App\Models\OurClientLogo;
use App\Models\Page;
use App\Models\VideoPlayer;

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

if(!function_exists('client_logos_file_path')) {

    function client_logos_file_path(): string
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
