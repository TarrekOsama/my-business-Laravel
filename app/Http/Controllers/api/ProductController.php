<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products=Product::all();
        return ProductResource::collection($products);

        //if you want to return identify data
        //$products=Product::find($id);
        //return new ProductResource(); 
     
    }
}
