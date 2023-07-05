<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Article;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //articles
        $articles = new Article();
        //products 
        $products = new Product();
        //link recommendation
        $randomRecommendation = $products->all()->random(1);
        //body recommendation
        $bodyRecommendation = $products->with('category')->orderBy('id_product', 'DESC')->limit(3)->get();
        //latest recommendation
        $latestRecommendation = $products->with('category')->with('discount')->orderBy('id_product', 'DESC')->limit(4)->get();
        //latest articles
        $latestArticles = $articles->with('user')->orderBy('id_article','DESC')->limit(2)->get();
        // return view('test.customer.home.home', compact('products','randomRecommendation','bodyRecommendation','latestRecommendation','latestArticles'));
        return view('pages.public.home', compact('randomRecommendation','bodyRecommendation','latestRecommendation','latestArticles'));

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
