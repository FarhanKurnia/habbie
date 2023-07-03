<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Offer;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //offers
        $offers = new Offer();
        $indexOffers = $offers->where('deleted_at',null)->with('product')->orderBy('id_offer','DESC')->paginate(10);
    
        return view('test.admin.offer.index-offer-admin', compact('indexOffers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = new Product();
        $indexProduct = $products->where('deleted_at',null)->get();
        return view('test.admin.offer.create-offer-admin',compact('indexProduct'));
     
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $slug = $request->name;
        $slug = preg_replace('/\s+/', '_', $slug);
        $slug = strtolower($slug);
        
        Offer::create([
            'name' => $request->name,
            'image' => $request->image,
            'slug' => $slug,
            'description' => $request->description,
            'product_id' => $request->product,
            'status' => $request->status,
        ]);
        return redirect()->route('indexOffers');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        //products
        $offers = new Offer();
        $oneOffer = $offers->where([['slug',$slug],['deleted_at',null]])->firstOrFail();
        return view('test.admin.offer.show-offer-admin', compact('oneOffer'));
   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        //offers
        $offers = new Offer();
        //products
        $products = new Product();

        $oneOffer = $offers->where([['slug',$slug],['deleted_at',null]])->with('product')->firstOrFail();
        $indexProducts = $products->where('deleted_at',null)->get();

        return view('test.admin.offer.update-offer-admin',compact('oneOffer','indexProducts'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        //offers
        $offers = new Offer();
        $getSlug = $request->name;
        $getSlug = preg_replace('/\s+/', '_', $getSlug);
        $getSlug = strtolower($getSlug);
        $offer = $offers->where([['deleted_at',null],['slug',$slug]])->firstOrFail();
        $offer->update([
            'name' => $request->name,
            'image' => $request->image,
            'slug' => $getSlug,
            'description' => $request->description,
            'product_id' => $request->product,
            'status' => $request->status,
        ]);
        if ($offer) {
            return redirect()
                ->route('indexOffers');
        } else {
            return redirect()
                ->back()
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($slug)
    {
        //offers
        $offers = new Offer();
        $offer = $offers->where([['slug',$slug],['deleted_at',null]])->firstOrFail();
        $offer->update([
            'deleted_at' => Carbon::now(),
            'slug' => $slug."-deleted",
        ]);
        if ($offer) {
            return redirect()
                ->route('indexOffers');
        } else {
            return redirect()
                ->back()
                ->withInput();
        }
    }
}
