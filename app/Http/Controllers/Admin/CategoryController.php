<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Brand;
use Illuminate\Validation\Rules\Exists;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('parent_id', NULL)->get();
        $subcategories = Category::whereNot('parent_id', NULL)->get();
        
        return view('admin.category.index', [
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('parent_id', NULL)->get();
        
        return view('admin.category.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {

        if($request->hasFile('picture')){
            
            $fileName = time().'_'.$request->file('picture')->getClientOriginalName();
            $filePath = $request->file('picture')->storeAs('/assets/images/categories', $fileName, 'public');

            $finalPath = '/storage/' . $filePath;
        }
        else{
            $finalPath = NULL;
        }
        
        ($request->parent_id == 'NULL') ? $parent_id = NULL : $parent_id = $request->parent_id;

       $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'description' => $request->description,
            'picture' => $finalPath,
            'parent_id' => $parent_id,
            'meta_title' => $request->metatitle,
            'meta_keyword' => $request->metakeyword,
            'meta_description' => $request->metadescription,
        ]);

        dd($category);
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
    public function edit(string $slug)
    {
        $collectionCategory = Category::where('slug', $slug)->get();

        $subcategories = Category::whereNot('parent_id', NULL)->get();

        foreach ($collectionCategory as $key => $value) {
                $category = $value;
        }
        
        // dd($subcategories->id);
        // $collectionBrands = Brand::where('category_id', $category->id)->get();
        $brands = Brand::all();
        // foreach ($collectionBrands as $key => $value) {
        //         $brands = $value;
        // }
        // dd($collectionBrands);
        return view('admin.category.edit', [
            'brands' =>$brands,
            'category' =>$category,
            'subcategories' =>$subcategories,
        ]);
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
