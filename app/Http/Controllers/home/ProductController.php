<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product){
        return view('home.products.show',[
            'product' => $product,
        ]);
    }
}
