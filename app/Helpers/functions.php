<?php

if(!function_exists('slider_file_path')){

    function slider_file_path(): string
    {
        return '/' . \App\Models\Slider::FILE_PATH;
    }

}

if(!function_exists('post_file_path')){

    function post_file_path(): string
    {
        return '/' . \App\Models\Post::FILE_PATH;
    }

}

if(!function_exists('project_file_path')){

    function project_file_path(): string
    {
        return '/' . \App\Models\Project::FILE_PATH;
    }

}

