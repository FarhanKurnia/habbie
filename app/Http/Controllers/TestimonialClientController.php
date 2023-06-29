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
        $categories = Product_Category::all();
        //products 
        $products = new Product();
        //testimonials
        $testimonials = new Testimonial();
        //reviews
        $reviews = new Review();

        //link recommendation
        $randomRecommendation = $products->all()->random(1);
        //offer
        $testimonials = $testimonials->get();
        //review
        $reviews = $reviews->get();
        return view('test.customer.testimonial.testimonial-client',compact('categories','randomRecommendation','testimonials','reviews'));
    }
}
