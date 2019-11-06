<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Product;

class ProductsController extends Controller
{
    public function products()
    {
        $products = Product::orderBy('id', 'desc')->paginate(24);
        return view('Frontend.pages.products')->with('products', $products);
    }
    
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();

        if( !is_null($product) )
        {
            return view('Frontend.pages.show', compact('product'));
        }
        else{
            session()->flash('Errors', 'No Product Found!!!');
            return redirect()->route('products');
        }
    }
}
