<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Page;
use App\Models\Admin\PriceBlock;
use App\Http\Requests\Admin\StorePriceBlockRequest;
use App\Http\Requests\Admin\UpdatePriceBlockRequest;
use Illuminate\Support\Facades\Cache;

class PriceBlockController extends Controller
{
    public function create(Page $id)
    {
        $localizations = Cache::get('translations');

        return view('admin.pages.price-block.create', compact('localizations', 'id'));
    }

    public function store(StorePriceBlockRequest $request)
    {
        dd($request->all());
    }

    public function show(PriceBlock $priceBlock)
    {
        //
    }

    public function edit(PriceBlock $priceBlock)
    {
        //
    }

    public function update(UpdatePriceBlockRequest $request, PriceBlock $priceBlock)
    {
        //
    }

    public function destroy(PriceBlock $priceBlock)
    {
        //
    }
}
