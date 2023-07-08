<?php

namespace App\Http\Controllers;
use App\Models\Offer;
use App\Models\Article;
use App\Models\Product;
use App\Models\Product_Category;
use App\Models\Testimonial;
use App\Models\Review;
use Illuminate\Http\Request;

class ClientController extends Controller
{
// Home funtion
    public function indexHome()
    {
        //articles
        $articles = new Article();
        //products 
        $products = new Product();
        //latest recommendation
        $latestRecommendation = $products->where('deleted_at',null)->with('category')->with('discount')->orderBy('id_product', 'DESC')->limit(4)->get();
        //latest articles
        $latestArticles = $articles->where('deleted_at',null)->with('user')->orderBy('id_article','DESC')->limit(2)->get();
        return view('test.customer.home.home', compact('latestRecommendation','latestArticles'));
    }

// Offers function
    public function indexOffers()
    {
        //offers
        $offers = new Offer();

        //offer
        $offers = $offers->where('deleted_at',null)->get();
        return view('test.customer.offer.offer-client',compact('offers'));   
    }

// Products function
    public function indexProducts()
    {
        //products 
        $products = new Product();

        //all products
        $allProduct = $products->where('deleted_at',null)->paginate(8);
        return view('test.customer.product.all-product-client', compact('allProduct'));
    }

    public function indexProductsByCat($slug)
    {
        //products 
        $products = new Product();
        //category
        $category = Product_Category::where([['slug',$slug],['deleted_at',null]])->firstOrFail();
        $cat = $category->id_category;
        //all products
        $productsByCat = $products->where('category_id',$cat)->with('category')->paginate(8);
        return view('test.customer.product.index-product-client', compact('category','productsByCat'));
    }

    public function showProduct($slug)
    {
        //products 
        $products = new Product();
        //product
        $oneProduct = $products->where([['slug',$slug],['deleted_at',null]])->with('category')->firstOrFail();
        //latest recommendation with same category as above
        $category_id = $oneProduct->category_id;
        $latestRecommendation = $products->where([['category_id',$category_id],['deleted_at',null]])->with('category')->with('discount')->orderBy('id_product', 'DESC')->limit(4)->get();
        return view('test.customer.product.show-product-client', compact('oneProduct','latestRecommendation'));
    }

// Categories function
    // Disable because using Product Function
    // public function indexCategories($slug)
    // {
    //     //products 
    //     $products = new Product();
    //     //category
    //     $categories = Product_Category::where('deleted_at',null)->get();
    //     $category = $categories->where([['slug',$slug],['deleted_at',null]])->firstOrFail();
    //     $cat = $category->id_category;
    //     //all products
    //     $productsByCat = $products->where('category_id',$cat)->with('category')->get();
    //     return view('test.customer.product.index-product-client', compact('category','productsByCat'));
    // }

// Testimonials function
    public function indexTestimonials(){
        //category
        $categories = Product_Category::where('deleted_at',null)->get();
        //products 
        $products = new Product();
        //testimonials
        $testimonials = new Testimonial();
        //reviews
        $reviews = new Review();

        //link recommendation
        $randomRecommendation = $products->where('deleted_at',null)->get()->random(1);
        //offer
        $testimonials = $testimonials->where('deleted_at',null)->get();
        //review
        $reviews = $reviews->where('deleted_at',null)->get();
        return view('test.customer.testimonial.testimonial-client',compact('categories','randomRecommendation','testimonials','reviews'));
    }

// Article function
    public function indexArticles()
    {
        //products
        $products = new Product();
        //articles
        $articles = new Article();

        //category
        $categories = Product_Category::all();
        //link recommendation
        $randomRecommendation = $products->all()->random(1);
        //offer
        $oneArticle = $articles->first();
        //review
        $relatedArticles = $articles->get();
        return view('test.customer.media.index-article-client',compact('categories','randomRecommendation','oneArticle','relatedArticles'));
    }

    public function showArticle($slug)
    {
        //products 
        $products = new Product();
        //articles
        $articles = new Article();
        
        //category
        $categories = Product_Category::where('deleted_at',null)->get();
        //link recommendation
        $randomRecommendation = $products->where('deleted_at',null)->get()->random(1);
        //find article 
        $oneArticle = $articles->where([['slug',$slug],['deleted_at',null]])->firstOrFail();
        //latest recommendation with same category as above
        $latestArticles = $articles->orderBy('id_article', 'DESC')->limit(4)->get();
        return view('test.customer.media.show-article-client', compact('categories','randomRecommendation','oneArticle','latestArticles'));
    }

//view order function
    public function order(){
        return view('test.customer.order.order-client');
    }

}
