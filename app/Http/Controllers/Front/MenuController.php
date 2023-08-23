<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\StoreMenuRequest;
use App\Http\Requests\Front\UpdateMenuRequest;
use App\Models\Front\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('parent.children')->get();

        return view('front.menus.index', compact('menus'));
    }

    public function create()
    {
        $menus = Menu::where(['parent_id' => 0])->get();
        return view('front.menus.create', compact('menus'));
    }

    public function store(StoreMenuRequest $request)
    {
        $data = $request->all();
        $data['slug'] = \Str::slug($data['menu_title']);
        isset($data['status']) ? $data['status'] = 1 : $data['status'] = 0;

        Menu::create($data);

        return redirect()->route('menus.index')->with('success', 'Menu created successfully!');
    }

    public function edit(Menu $menu)
    {
        $menus = Menu::where(['parent_id' => 0])->get();

        return view('front.menus.edit', compact('menu', 'menus'));
    }

    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        $data = $request->all();
        $data['slug'] = \Str::slug($data['menu_title']);
        isset($data['status']) ? $data['status'] = 1 : $data['status'] = 0;

        $menu->update($data);

        return redirect()->route('menus.index')->with('success', 'Menu edited successfully!');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('menus.index')->with('success', 'Menu deleted successfully!');
    }
}
