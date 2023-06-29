<?php

namespace App\Http\Controllers;
use App\Models\Testimonial;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class TestimonialClientController extends Controller
{
    public function index(){
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
        return view('test.customer.testimonial.testimonial-client',compact('randomRecommendation','testimonials','reviews'));
    }
}
