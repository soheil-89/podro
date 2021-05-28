<?php


namespace App\Http\Controllers\Api\v1;


use App\Http\Requests\v1\ProductListRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class MarketController extends Controller
{
    public function view(Request $request){
        $input=$request->all();
        Cache::has("view_{$input["U"]}_{$input["P"]}");
    }

}
