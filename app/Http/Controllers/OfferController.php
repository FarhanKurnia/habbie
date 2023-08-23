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
        return view('pages.admin.offers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = new Product();
        $indexProducts = $products->where('deleted_at',null)->get();
        return view('pages.admin.offers.create',compact('indexProducts'));
     
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
                'description' => 'required',
                'product' => 'required',
                'status' => 'required',
            ]);
    
    
            $slug = $request->name;
            $slug = preg_replace('/\s+/', '-', $slug);
            $slug = strtolower($slug);
    
            //image
            $image = $request->file('image');
            $image_name = time()."_".$image->getClientOriginalName();
            $folder = 'storage/img/offers/';
            $image->move(public_path($folder), $image_name);
            
            $offer = Offer::create([
                'name' => $request->name,
                'image' => $folder.$image_name,
                'slug' => $slug,
                'description' => $request->description,
                'product_id' => $request->product,
                'status' => $request->status,
            ]);
            
            return redirect()->route('editOffers', $offer->slug)->with([
                'success' => 'Product has been added successfully <a href="'. url('offers/'.$offer->slug) .'" target="_blank">See Offers</a>'
            ]);

        } catch(\Exception $e){
            return redirect()
            ->route('createOffers')->with([
                'error' => 'An error occurred: ' . $e->getMessage()
            ]);
        }
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

        return view('pages.admin.offers.create',compact('oneOffer','indexProducts'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {

        //offers
        $offer = Offer::where([['deleted_at',null],['slug',$slug]])->firstOrFail();

        $getSlug = $request->name;
        $getSlug = preg_replace('/\s+/', '-', $getSlug);
        $getSlug = strtolower($getSlug);
        
        //image
        $update_image ="";
        if($request->image){
            $image = $request->file('image');
            $image_name = time()."_".$image->getClientOriginalName();
            $folder = 'storage/img/offers/';
            $image->move(public_path($folder), $image_name);
            $update_image = $folder.$image_name;
        }else{
            $update_image = $offer->image;  
        }
        
        $offer->update([
            'name' => $request->name,
            'image' => $update_image,
            'slug' => $getSlug,
            'description' => $request->description,
            'product_id' => $request->product,
            'status' => $request->status,
        ]);
        if ($offer) {
            return redirect()
                ->route('editOffers', $offer->slug)
                ->with([
                    'success' => 'Offer has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
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
