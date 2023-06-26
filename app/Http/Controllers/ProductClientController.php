<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Product_Category;
use Illuminate\Http\Request;

class ProductClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($slug)
    {
        //products 
        $products = new Product();
        //categories
        $categories = new Product_Category();
        $cat = $categories->where('slug',$slug)->firstOrFail();
        $cat = $cat->id_category;
        //link recommendation
        $randomRecommendation = $products->all()->random(1);
        //all products
        $productsByCat = $products->where('category_id',$cat)->with('category')->get();
        return view('test.index-product-client', compact('randomRecommendation','productsByCat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        //products 
        $products = new Product();
        
        //product
        $oneProduct = $products->where('slug',$slug)->with('category')->firstOrFail();
        //link recommendation
        $randomRecommendation = $products->all()->random(1);
        //latest recommendation with same category as above
        $category_id = $oneProduct->category_id;
        $latestRecommendation = $products->where('category_id',$category_id)->with('category')->with('discount')->orderBy('id_product', 'DESC')->limit(4)->get();
        return view('test.show-product-client', compact('randomRecommendation','oneProduct','latestRecommendation'));
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
