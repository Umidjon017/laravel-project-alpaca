<?php

namespace App\Http\Controllers;

use App\Models\Admin\Page;
use App\Models\Front\Banner;
use App\Models\Front\Feedback;
use App\Models\Front\ForDoctor;
use App\Models\Front\ForIt;
use App\Models\Front\ForLeader;
use App\Models\Front\ForMarketology;
use App\Models\Front\Menu;
use App\Models\Front\OurPartner;
use App\Models\Front\OurPartnerLogo;
use App\Models\Front\OurPhilosophy;
use App\Models\Front\Recommendation;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $menus = Menu::where('status', 1)->with('parent.children', 'translations')->orderBy('order_id')->get();
        $banners = Banner::with('translations')->get();
        $ourPhilosophy = OurPhilosophy::with('translations')->get();
        $doctors = ForDoctor::with('translations')->get();
        $leaders = ForLeader::with('translations')->get();
        $its = ForIt::with('translations')->get();
        $marketologies = ForMarketology::with('translations')->get();
        $feedbacks = Feedback::with('translations')->get();
        $partners = OurPartner::with('translations')->get();
        $partner_logos = OurPartnerLogo::all();
        $recommendations = Recommendation::with('translations')->get();

        return view('front.index', compact(
            'menus', 'banners', 'ourPhilosophy', 'doctors', 'leaders', 'its', 'marketologies',
            'feedbacks', 'partners', 'partner_logos', 'recommendations'
        ));
    }

    public function page(string $page): View
    {
        $menus = Menu::where('status', 1)->with('parent.children')->orderBy('order_id')->get();
        $route = Page::where('slug', $page)->with('translations', 'galleries', 'infos', 'comments',
            'textBlocks', 'checkBoxes', 'videoPlayers', 'ourClients', 'ourClientsLogo', 'directSpeeches',
            'recommendationBlocks', 'appeals', 'rules', 'prices', 'bannerBlocks')->first();

        if (! $route) {
            abort(404);
        }

        return view('front.innerPage', compact('menus','route'));
    }
}
