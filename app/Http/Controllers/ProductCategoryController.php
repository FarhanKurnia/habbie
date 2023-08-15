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
        return view('pages.admin.products.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.products.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            //slug
            $slug = $request->name;
            $slug = preg_replace('/\s+/', '-', $slug);
            $slug = strtolower($slug);
            
            //icon category product
            $icon = $request->file('icon');
            $icon_name = time()."_".$icon->getClientOriginalName();
            $folder = 'storage/img/categories_product/';
            $icon->move(public_path($folder), $icon_name);
    
            $category = Product_Category::create([
                'name' => $request->name,
                'icon' => $folder.$icon_name,
                'slug' => $slug,
            ]);
            return redirect()->route('editCategories', $category->slug)->with([
                'success' => 'Category product has been added successfully'
            ]);

        } catch(\Exception $e){
            return redirect()
            ->route('createCategories')->with([
                'error' => 'An error occurred: ' . $e->getMessage()
            ]);
        }
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
        return view('pages.admin.products.categories.create',compact('oneCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1048',
        ]);
        //products
        $categories = new Product_Category();
        $category = $categories->where([['deleted_at',null],['slug',$slug]])->firstOrFail();

        //slug
        $getSlug = $request->name;
        $getSlug = preg_replace('/\s+/', '-', $getSlug);
        $getSlug = strtolower($getSlug);
        
        //icon
        $update_icon ="";
        if($request->icon){
            $icon = $request->file('icon');
            $icon_name = time()."_".$icon->getClientOriginalName();
            $folder = 'storage/img/categories_product/';
            $icon->move(public_path($folder), $icon_name);
            $update_icon = $folder.$icon_name;
        }else{
            $update_icon = $category->icon;  
        }
 
        $category->update([
            'name' => $request->name,
            'icon' => $update_icon,
            'slug' => $getSlug,
        ]);
        if ($category) {
            return redirect()
                ->route('editCategories', $category->slug)
                ->with([
                    'success' => 'Category product has been updated successfully'
                ]);
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
