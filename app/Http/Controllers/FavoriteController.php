<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }


    public function index()
    {
        return auth()->user()->favorites;
    }

    public function store(Request $request)
    {
         auth()->user()->favorites()->attach($request->product_id);

        return response()->json([
            "yuklandi"=>"toliq yuklandi"
        ]);

    }

    public function destroy($favorite_id)
    {
        if(auth()->user()->hasFavorite($favorite_id)){
            auth()->user()->favorites()->detach($favorite_id);

            return response()->json([
              "yulash" =>"O'chirildi yuborhanm ",
            ]);
        }
        return response()->json([
            "yulash" =>"O'chirildi madi ",
            "bu user" =>"yo'q ekan"
          ]);
    }

}
