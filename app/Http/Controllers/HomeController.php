<?php

namespace App\Http\Controllers;

use App\Models\Front\Banner;
use App\Models\Front\Feedback;
use App\Models\Front\ForDoctor;
use App\Models\Front\ForIt;
use App\Models\Front\ForLeader;
use App\Models\Front\ForMarketology;
use App\Models\Front\Menu;
use App\Models\Front\OurPartnerLogo;
use App\Models\Front\OurPhilosophy;
use App\Models\Front\Recommendation;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index(): View
    {
        $menus = Menu::with('parent.children')->get();
        $banners = Banner::with('translations')->get();
        $ourPhilosophy = OurPhilosophy::with('translations')->get();
        $doctors = ForDoctor::with('translations')->get();
        $leaders = ForLeader::with('translations')->get();
        $its = ForIt::with('translations')->get();
        $marketologies = ForMarketology::with('translations')->get();
        $feedbacks = Feedback::with('translations')->get();
        $partners = OurPartnerLogo::all();
        $recommendations = Recommendation::with('translations')->get();

        return view('front.index', compact(
            'menus', 'banners', 'ourPhilosophy', 'doctors', 'leaders', 'its', 'marketologies',
            'feedbacks', 'partners', 'recommendations'
        ));
    }
}
