<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\StoreMenuRequest;
use App\Http\Requests\Front\UpdateMenuRequest;
use App\Models\Front\Menu;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('parent.children', 'translations')
            ->where('parent_id', 0)
            ->orderBy('parent_id')
            ->get();

        return view('front.menus.index', compact('menus'));
    }

    public function create()
    {
        $menus = Menu::where(['parent_id' => 0])->get();
        $localizations = Cache::get('localizations');

        return view('front.menus.create', compact('menus', 'localizations'));
    }

    public function store(StoreMenuRequest $request)
    {
        try{
            DB::transaction(function() use ($request) {
                $data = $request->all();
                $menu = Menu::create($data);

                foreach($request->translations as $key=>$value) {
                    $menu->translations()->create([
                        'localization_id'=>$key,
                        'menu_title'=>$value['menu_title'],
                    ]);
                }
            });
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.main-page.menus.index')->with('success', 'Menu created successfully!');
    }

    public function edit(Menu $menu)
    {
        $menus = Menu::where(['parent_id' => 0])->with('translations')->get();
        $localizations = Cache::get('localizations');

        return view('front.menus.edit', compact('menu', 'menus', 'localizations'));
    }

    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        try {
            DB::transaction(function() use ($request, $menu){
                $data = $request->all();
                $menu->update($data);

                foreach($request->translations as $key => $value){
                    $menu->translations()->updateOrCreate(['id' => $value['id']], [
                        'localization_id'=>$key,
                        'menu_title'=>$value['menu_title'],
                    ]);
                }
            });

        } catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.main-page.menus.index')->with('success', 'Menu edited successfully!');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->back()->with('success', 'Menu deleted successfully!');
    }
}
