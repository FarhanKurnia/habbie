<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Product;
use App\Models\Product_Category;
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
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
