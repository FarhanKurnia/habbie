<?php
namespace App\Http\Controllers;

class CheckoutController extends Controller
{
    public function show()
    {
        if(intval(\Cart::getTotal()) === 0){
            return redirect()->back();
        } 
        
        return view('pages.public.checkout');

    }
}