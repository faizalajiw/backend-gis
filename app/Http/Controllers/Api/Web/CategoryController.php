<?php

namespace App\Http\Controllers\Api\Web;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    /**
     * Display
     * list data kategori
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get categories
        $categories = Category::latest()->get();

        //return with Api Resource
        return new CategoryResource(true, 'List Data Categories', $categories);
    }

    /**
     * Display the specified resource.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $category = Category::with('places.category', 'places.images')->where('slug', $slug)->first();

        if ($category) {
            //return success with Api Resource
            return new CategoryResource(true, 'List Data Places By : ' . $category->name, $category);
        }

        //return failed with Api Resource
        return new CategoryResource(false, 'Data Category Tidak Ditemukan!', null);
    }
}
