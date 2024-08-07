<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index(Product $product)
    {
        return response([
            "overall_rating" => round($product->reviews()->avg('rating'), 1),
            "reviews_count" => $product->reviews()->count(),
            "reviews" => ReviewResource::collection($product->reviews()->paginate(10)) 
        ]);
    }
    public function store(Product $product, StoreReviewRequest $request)
    {
       $product->reviews()->create([
           "user_id" => auth()->id(),
           'body' => $request->body,
           "rating"=> $request->rating
       ]);

       return response([
        'seccess' => true,
        'massege'=>"yuklandi"
       ]);

    }
}
