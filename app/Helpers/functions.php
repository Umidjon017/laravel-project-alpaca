<?php

use App\Models\Gallery;
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
