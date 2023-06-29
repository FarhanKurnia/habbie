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
        //category
        $categories = Product_Category::where('deleted_at',null)->get();
        //articles
        $articles = new Article();
        //products 
        $products = new Product();
        //link recommendation
        $randomRecommendation = $products->where('deleted_at',null)->get()->random(1);
        //body recommendation
        $bodyRecommendation = $products->where('deleted_at',null)->with('category')->limit(3)->get();
        //latest recommendation
        $latestRecommendation = $products->where('deleted_at',null)->with('category')->with('discount')->orderBy('id_product', 'DESC')->limit(4)->get();
        //latest articles
        $latestArticles = $articles->where('deleted_at',null)->with('user')->orderBy('id_article','DESC')->limit(2)->get();
        return view('test.customer.home.home', compact('categories','randomRecommendation','bodyRecommendation','latestRecommendation','latestArticles'));
    }

// Offers function
    public function indexOffers()
    {
        //category
        $categories = Product_Category::where('deleted_at',null)->get();
        //products 
        $products = new Product();
        //offers
        $offers = new Offer();

        //link recommendation
        $randomRecommendation = $products->where('deleted_at',null)->get()->random(1);
        //offer
        $offers = $offers->where('deleted_at',null)->get();
        return view('test.customer.offer.offer-client',compact('categories','randomRecommendation','offers'));   
    }

// Products function
    public function indexProducts()
    {
        //products 
        $products = new Product();
        
        //category
        $categories = Product_Category::where('deleted_at',null)->get();
        //link recommendation
        $randomRecommendation = $products->where('deleted_at',null)->get()->random(1);
        //all products
        $allProduct = $products->where('deleted_at',null)->paginate(8);
        return view('test.customer.product.all-product-client', compact('categories','randomRecommendation','allProduct'));
    }
    public function indexProductsByCat($slug)
    {
        //products 
        $products = new Product();
        //category
        $categories = Product_Category::where('deleted_at',null)->get();
        $cat = Product_Category::where([['slug',$slug],['deleted_at',null]])->firstOrFail();
        $cat = $cat->id_category;
        //link recommendation
        $randomRecommendation = $products->where('deleted_at',null)->get()->random(1);
        //all products
        $productsByCat = $products->where('category_id',$cat)->with('category')->paginate(8);
        return view('test.customer.product.index-product-client', compact('categories','randomRecommendation','productsByCat'));
    }
    public function showProduct($slug)
    {
        //products 
        $products = new Product();
        //category
        $categories = Product_Category::where('deleted_at',null)->get();
        //product
        $oneProduct = $products->where([['slug',$slug],['deleted_at',null]])->with('category')->firstOrFail();
        //link recommendation
        $randomRecommendation = $products->where('deleted_at',null)->get()->random(1);
        //latest recommendation with same category as above
        $category_id = $oneProduct->category_id;
        $latestRecommendation = $products->where([['category_id',$category_id],['deleted_at',null]])->with('category')->with('discount')->orderBy('id_product', 'DESC')->limit(4)->get();
        return view('test.customer.product.show-product-client', compact('categories','randomRecommendation','oneProduct','latestRecommendation'));
    }

// Categories function
    public function indexCategories($slug)
    {
        //products 
        $products = new Product();
        //category
        $categories = Product_Category::where('deleted_at',null)->get();
        $cat = $categories->where([['slug',$slug],['deleted_at',null]])->firstOrFail();
        $cat = $cat->id_category;
        //link recommendation
        $randomRecommendation = $products->where('deleted_at',null)->get()->random(1);
        //all products
        $productsByCat = $products->where('category_id',$cat)->with('category')->get();
        return view('test.customer.product.index-product-client', compact('randomRecommendation','productsByCat'));
    }

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


}
