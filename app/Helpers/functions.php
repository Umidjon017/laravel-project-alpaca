<?php

use App\Models\Admin\Comment;
use App\Models\Admin\DirectSpeech;
use App\Models\Admin\Gallery;
use App\Models\Admin\InfoBlock;
use App\Models\Admin\OurClientLogo;
use App\Models\Admin\OurRule;
use App\Models\Admin\Page;
use App\Models\Admin\PriceBlock;
use App\Models\Admin\RecommendationBlock;
use App\Models\Admin\VideoPlayer;
use App\Models\Front\Banner;
use App\Models\Front\Feedback;
use App\Models\Front\ForDoctor;
use App\Models\Front\ForIt;
use App\Models\Front\ForLeader;
use App\Models\Front\ForMarketology;
use App\Models\Front\OurPartnerLogo;
use App\Models\Front\OurPhilosophy;
use App\Models\Front\Recommendation;

if (! function_exists('active_class')){
    function active_class(array $path, string $active = 'active'): string {
        return call_user_func_array('Request::is', $path) ? $active : '';
    }
}

if (! function_exists('is_active_route')) {
    function is_active_route(array $path): string {
        return call_user_func_array('Request::is', $path) ? 'true' : 'false';
    }
}

if (! function_exists('show_class')) {
    function show_class(array $path): string {
        return call_user_func_array('Request::is', $path) ? 'show' : '';
    }
}

if(!function_exists('page_file_path')) {
    function page_file_path(): string {
        return '/' . Page::FILE_PATH;
    }
}

if(!function_exists('gallery_file_path')) {
    function gallery_file_path(): string {
        return '/' . Gallery::FILE_PATH;
    }
}

if(!function_exists('info_file_path')) {
    function info_file_path(): string {
        return '/' . InfoBlock::FILE_PATH;
    }
}

if(!function_exists('comment_file_path')) {
    function comment_file_path(): string {
        return '/' . Comment::FILE_PATH;
    }
}

if(!function_exists('videos_file_path')) {
    function videos_file_path(): string {
        return '/' . VideoPlayer::FILE_PATH;
    }
}

if(!function_exists('clients_logo_file_path')) {
    function clients_logo_file_path(): string {
        return '/' . OurClientLogo::FILE_PATH;
    }
}

if(!function_exists('direct_speech_file_path')) {
    function direct_speech_file_path(): string {
        return '/' . DirectSpeech::FILE_PATH;
    }
}

if(!function_exists('banner_file_path')) {
    function banner_file_path(): string {
        return '/' . Banner::FILE_PATH;
    }
}

if(!function_exists('doctors_file_path')) {
    function doctors_file_path(): string {
        return '/' . ForDoctor::FILE_PATH;
    }
}

if(!function_exists('leaders_file_path')) {
    function leaders_file_path(): string {
        return '/' . ForLeader::FILE_PATH;
    }
}

if(!function_exists('it_file_path')) {
    function it_file_path(): string {
        return '/' . ForIt::FILE_PATH;
    }
}

if(!function_exists('marketology_file_path')) {
    function marketology_file_path(): string {
        return '/' . ForMarketology::FILE_PATH;
    }
}

if(!function_exists('feedback_file_path')) {
    function feedback_file_path(): string {
        return '/' . Feedback::FILE_PATH;
    }
}

if(!function_exists('philosophy_file_path')) {
    function philosophy_file_path(): string {
        return '/' . OurPhilosophy::FILE_PATH;
    }
}

if(!function_exists('partners_file_path')) {
    function partners_file_path(): string {
        return '/' . OurPartnerLogo::FILE_PATH;
    }
}

if(!function_exists('recommendations_file_path')) {
    function recommendations_file_path(): string {
        return '/' . Recommendation::FILE_PATH;
    }
}

if(!function_exists('recommendations_admin_file_path')) {
    function recommendations_admin_file_path(): string {
        return '/' . RecommendationBlock::FILE_PATH;
    }
}

if(!function_exists('prices_file_path')) {
    function prices_file_path(): string {
        return '/' . PriceBlock::FILE_PATH;
    }
}

if(!function_exists('rules_file_path')) {
    function rules_file_path(): string {
        return '/' . OurRule::FILE_PATH;
    }
}
