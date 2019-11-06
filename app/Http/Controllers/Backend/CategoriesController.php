<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;
use App\Product;
use App\ProductImage;
use Image;
use File;


class CategoriesController extends Controller
{

    // Add New Category Page
    public function createcategory()
    {
        $primary_categories = Category::orderBy('name', 'asc')->where('parent_id', NULL)->get();
        return view('Backend.pages.categories.createcategories', compact('primary_categories'));
    }

    // Manage All Product Page
    public function manage_category()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view ('Backend.pages.categories.manage', compact('categories'));
    }

    // Create e New Category
    public function category_store(Request $request)
    {
        // Validate The Form Data
        $request->validate([
            'name'              => 'required|max:255',
            'description'       => 'required|max:1200',
            'image'             => 'nullable|image',
        ],
        [
            'name.required'         => 'Please Provide Category Name',
            'description.required'  => 'Please Provide Description of the Category',
            'image.image'           => 'Please Provide a Valid image with .jpg, .jpeg, .png extension..', 
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->desc = $request->description;
        $category->parent_id = $request->parent_id;

        if ( $request->image )
        {
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('image/category-image/' . $img);
            Image::make($image)->save($location);
            $category->image = $img;
        }

        $category->save();

        session()->flush('success', 'A New Category Has Been Added Successfully');
        return redirect()->route('managecategory');
    }

    // Go to the Edit Category Page
    public function edit_category($id)
    {
        $primary_categories = Category::orderBy('name', 'asc')->where('parent_id', NULL)->get();
        $category = Category::find($id);
        if ( !is_null($category) ){
            return view('Backend.pages.categories.editcategories', compact('category', 'primary_categories'));
        }else{
            return route('managecategory');
        }
    }

    // Update The Category Name
    public function category_update(Request $request, $id)
    {
        // Validate The Form Data
        $request->validate([
            'name'              => 'required|max:255',
            'description'       => 'required|max:1200',
            'image'             => 'nullable|image',
        ],
        [
            'name.required'         => 'Please Provide Category Name',
            'description.required'  => 'Please Provide Description of the Category',
            'image.image'           => 'Please Provide a Valid image with .jpg, .jpeg, .png extension..', 
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->desc = $request->description;
        $category->parent_id = $request->parent_id;

        if ( $request->image )
        {   
            /*if ( File::exists('image/category-image/' .$category->image) ){
                File::delete('image/category-image/' .$category->image);
            }*/
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('image/category-image/' . $img);
            Image::make($image)->save($location);
            $category->image = $img;
        }

        $category->save();

        session()->flush('success', 'A New Category Has Been Added Successfully');
        return redirect()->route('managecategory');
    }

    // Category Delete Function
    public function category_delete($id)
    {
        $category = Category::find($id);
        if ( !is_null($category) )
        {   
            // If it is Parent Category, Then We will Delete all it's Sub Category
            if ($category->parent_id == NULL){
                // Delete Sub Categories
                $sub_categories = Category::orderBy('name', 'asc')->where('parent_id', $category->id)->get();
                
                foreach( $sub_categories as $sub ){
                    if ( File::exists('image/category-image/' .$sub->image) ){
                        File::delete('image/category-image/' .$sub->image);
                    }
                    $sub->delete();
                }
            }


            if ( File::exists('image/category-image/' .$category->image) ){
                File::delete('image/category-image/' .$category->image);
            }

            $category->delete();
        }
        session()->flush('success', 'Product Successfully Deleted');
        return back();
    }
    
}
