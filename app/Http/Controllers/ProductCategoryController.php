<?php

namespace App\Http\Controllers;
use App\Models\Product_Category;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //categories
        $categories = new Product_Category();

        $indexCategories = $categories->where('deleted_at',null)->paginate(10);

        return view('test.admin.category.index-category-admin',compact('indexCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('test.admin.category.create-category-admin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $slug = $request->name;
        $slug = preg_replace('/\s+/', '_', $slug);
        $slug = strtolower($slug);
        
        Product_Category::create([
            'name' => $request->name,
            'slug' => $slug,
        ]);
        return redirect()->route('indexCategories');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        //products
        $categories = new Product_Category();
        $oneCategory = $categories->where([['slug',$slug],['deleted_at',null]])->firstOrFail();
        return view('test.admin.category.show-category-admin', compact('oneCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        //categories
        $categories = new Product_Category();
        $oneCategory = $categories->where([['slug',$slug],['deleted_at',null]])->firstOrFail();
        return view('test.admin.category.update-category-admin',compact('oneCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        //products
        $categories = new Product_Category();
        $getSlug = $request->name;
        $getSlug = preg_replace('/\s+/', '_', $getSlug);
        $getSlug = strtolower($getSlug);

        $category = $categories->where([['deleted_at',null],['slug',$slug]])->firstOrFail();
        $category->update([
            'name' => $request->name,
            'slug' => $getSlug,
        ]);
        if ($category) {
            return redirect()
                ->route('indexCategories');
        } else {
            return redirect()
                ->back()
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($slug)
    {
        //categories
        $categories = new Product_Category();
        $category = $categories->where([['slug',$slug],['deleted_at',null]])->firstOrFail();
        $category->update([
            'deleted_at' => Carbon::now(),
            'slug' => $slug."-deleted",
        ]);
        if ($category) {
            return redirect()
                ->route('indexCategories');
        } else {
            return redirect()
                ->back()
                ->withInput();
        }
    }
}
