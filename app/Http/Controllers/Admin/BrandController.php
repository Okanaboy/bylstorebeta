<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        $subcategories = Category::whereNotNull('parent_id')->get();
        return view('admin.brand.index', [
            'brands' => $brands,
            'subcategories' => $subcategories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::whereNotNull('parent_id')->get();
        
        return view('admin.brand.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        if($request->hasFile('picture')){
            
            $fileName = time() . '_' . $request->file('picture')->getClientOriginalName();
            $filePath = $request->file('picture')->storeAs('/assets/images/brands', $fileName, 'public');

            $finalPath = '/storage/' . $filePath;
        }
        else{
            $finalPath = NULL;
        }

       $brand = Brand::create([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'description' => $request->description,
            'picture' => $finalPath,
            'category_id' => $request->category_id,
            'meta_title' => $request->metatitle,
            'meta_keyword' => $request->metakeyword,
            'meta_description' => $request->metadescription,
        ]);

        dd($brand);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
