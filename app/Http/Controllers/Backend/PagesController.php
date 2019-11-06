<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;
use App\Product;
use App\ProductImage;
use Image;
use File;


// Platform Admin Panel View Files Location
class PagesController extends Controller
{
	// Admin Home Page
    public function index()
    {
    	return view ('Backend.pages.index');
    }

}
