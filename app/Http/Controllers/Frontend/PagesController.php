<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


// Call the Product Model to show the products into the products page
// Platform Front End View Files Location
use App\Product;

class PagesController extends Controller
{
    // This is our Home Page
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
    	return view('Frontend.pages.index', compact('products'));
    }
    
    public function login()
    {
    	return view('Frontend.pages.login');
    }
    public function register()
    {
    	return view('Frontend.pages.register');
    }

}
