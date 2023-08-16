<?php

use App\Models\Comment;
use App\Models\Gallery;
use App\Models\InfoBlock;
use App\Models\Page;

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
