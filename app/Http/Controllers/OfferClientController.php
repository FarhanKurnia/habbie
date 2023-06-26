<?php

namespace App\Http\Controllers;
use App\Models\Offer;
use App\Models\Product;
use Illuminate\Http\Request;

class OfferClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //products 
        $products = new Product();
        //offers
        $offers = new Offer();

        //link recommendation
        $randomRecommendation = $products->all()->random(1);
        //offer
        $offers = $offers->get();
        return view('test.customer.offer.offer-client',compact('randomRecommendation','offers'));
        
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
