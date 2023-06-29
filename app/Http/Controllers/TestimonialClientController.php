<?php

namespace App\Http\Controllers;
use App\Models\Testimonial;
use App\Models\Product;
use App\Models\Review;
use App\Models\Product_Category;
use Illuminate\Http\Request;

class TestimonialClientController extends Controller
{
    public function index(){
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
}
