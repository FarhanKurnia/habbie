<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Product;
use Illuminate\Http\Request;

class ArticleClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //products
        $products = new Product();
        //articles
        $articles = new Article();

        //link recommendation
        $randomRecommendation = $products->all()->random(1);
        //offer
        $oneArticle = $articles->first();
        //review
        $relatedArticles = $articles->get();
        return view('test.customer.media.index-article-client',compact('randomRecommendation','oneArticle','relatedArticles'));
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
        //articles
        $articles = new Article();
        
        //link recommendation
        $randomRecommendation = $products->all()->random(1);
        //find article 
        $oneArticle = $articles->where('slug',$slug)->firstOrFail();
        //latest recommendation with same category as above
        $latestArticles = $articles->orderBy('id_article', 'DESC')->limit(4)->get();
        return view('test.customer.media.show-article-client', compact('randomRecommendation','oneArticle','latestArticles'));
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
