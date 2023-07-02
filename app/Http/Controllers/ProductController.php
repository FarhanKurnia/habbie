<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Product;
use App\Models\Product_Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource Admin.
     */
    public function index()
    {
        //products
        $products = new Product();
        $indexProducts = $products->where('deleted_at',null)->with('category')->orderBy('id_product','DESC')->paginate(10);
    
        return view('test.admin.product.index-product-admin', compact('indexProducts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //categories
        $categories = new Product_Category();
        //discounts
        $discounts = new Discount();
        $indexCategories = $categories->where('deleted_at',null)->get();
        $indexDiscounts = $discounts->where('deleted_at',null)->get();

        return view('test.admin.product.create-product-admin',compact('indexCategories','indexDiscounts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $slug = $request->name;
        $slug = preg_replace('/\s+/', '_', $slug);
        
        Product::create([
            'name' => $request->name,
            'image' => '/path/images.jpg',
            'slug' => $slug,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'rating' => $request->rating,
            'discount_id' => $request->discount,
            'category_id' => $request->category,

        ]);
        return redirect()->route('indexProducts');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        //products
        $products = new Product();
        $oneProduct = $products->where([['slug',$slug],['deleted_at',null]])->with('category')->firstOrFail();
        return view('test.admin.product.show-product-admin', compact('oneProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        //products
        $products = new Product();
        //categories
        $categories = new Product_Category();
        //discounts
        $discounts = new Discount();

        $oneProduct = $products->where([['slug',$slug],['deleted_at',null]])->with('category')->firstOrFail();
        $indexCategories = $categories->where('deleted_at',null)->get();
        $indexDiscounts = $discounts->where('deleted_at',null)->get();

        return view('test.admin.product.update-product-admin',compact('oneProduct','indexCategories','indexDiscounts'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        //products
        $products = new Product();
        $getSlug = $request->name;
        $getSlug = preg_replace('/\s+/', '_', $slug);
        $product = $products->where([['deleted_at',null],['slug',$slug]])->firstOrFail();
        $product->update([
            'name' => $request->name,
            'image' => '/path/images.jpg',
            'slug' => $getSlug,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'rating' => $request->rating,
            'discount_id' => $request->discount,
            'category_id' => $request->category,
        ]);
        if ($product) {
            return redirect()
                ->route('indexProducts')
                ->with([
                    'success' => 'Post has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($slug)
    {
        //products
        $products = new Product();
        $product = $products->where([['slug',$slug],['deleted_at',null]])->firstOrFail();
        $product->update([
            'deleted_at' => Carbon::now(),
            'slug' => $slug."-deleted",
        ]);
        if ($product) {
            return redirect()
                ->route('indexProducts');
        } else {
            return redirect()
                ->back()
                ->withInput();
        }
    }
}
