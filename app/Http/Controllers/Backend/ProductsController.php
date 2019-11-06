<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Product;
use App\ProductImage;
use Image;
use File;


class ProductsController extends Controller
{
    // Add New Product Page
    public function createproduct()
    {
        return view ('Backend.pages.product.createproduct');
    }

    // Manage All Product Page
    public function manage_product()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view ('Backend.pages.product.manage')->with('products', $products);
    }

    // Edit Product Page
    public function edit_product($id)
    {
        $product = Product::find($id);
        return view ('Backend.pages.product.editproduct')->with('product', $product);
    }

    // Add New Product Function
    public function product_store(Request $request)
    {
        // Validate The Form Data
        $request->validate([
            'title'         => 'required|max:255',
            'description'   => 'required|max:1200',
            'quantity'      => 'required',
            'price'         => 'required',
            'product_image' => 'required'
        ]);


        $products = new Product;
        $products->category_id  = 1;
        $products->brand_id     = 1;
        $products->title        = $request->title;
        $products->description  = $request->description;
        $products->slug         = str_slug($request->title);
        $products->quantity     = $request->quantity;
        $products->price        = $request->price;
        $products->status       = 1;
        $products->offer_price  = $request->offerprice;
        $products->admin_id     = 1;
        // Save all the Product Data into the Products Table
        $products->save();


        // Check if the product has Multiple thumbnail image
        if ( count( $request->product_image ) > 0 ){
            foreach ($request->product_image as $image) {
                //$image = $request->file('product_image');
                $img =  time() . '.' . $image->getClientOriginalExtension(); 
                // Move the Product Image into the required folder
                $location = public_path('image/product-image/' . $img);
                Image::make($image)->save($location);
                
                // Create the ProductImage Model
                $product_images = new ProductImage;
                // Insert the Data inside the Product_image Table [product id, image name]
                $product_images->product_id = $products->id;
                $product_images->image = $img;
                $product_images->save();                
            }
        }
        return redirect()->route('manageproduct');
    }



    // Add New Product Function
    public function product_update(Request $request, $id)
    {
        // Validate The Form Data
        $request->validate([
            'title'         => 'required|max:255',
            'description'   => 'required|max:1200',
            'quantity'      => 'required',
            'price'         => 'required',
            /*'product_image' => 'required'*/
        ]);

        $products = Product::find($id);
        $products->title        = $request->title;
        $products->description  = $request->description;
        $products->slug         = str_slug($request->title);
        $products->quantity     = $request->quantity;
        $products->price        = $request->price;
        $products->offer_price  = $request->offerprice;
        // Save all the Product Data into the Products Table
        $products->save();
        return redirect()->route('manageproduct');
    }


    public function product_delete($id)
    {
        $product = Product::find($id);
        if ( !is_null($product) )
        {
            $product->delete();
        }
        session()->flush('success', 'Product Successfully Deleted');
        return back();
    }
}
