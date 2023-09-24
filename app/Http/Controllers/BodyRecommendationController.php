<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use App\Models\Body_Recommendation;
use App\Models\Product;
use Illuminate\Http\Request;

class BodyRecommendationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $recommendation = Body_Recommendation::where('deleted_at',null)->get();
        // dd($recommendation);
        return view('pages.admin.recommendation.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $recommendations = new Body_Recommendation();
        $products = new Product();

        $indexRecommendations = $recommendations->where('deleted_at',null)->get();
        $indexProducts = $products->where([['deleted_at',null],['status','active']])->get();
        
        return view('pages.admin.recommendation.create',compact('indexRecommendations','indexProducts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
                    // 'name','image', 'description', 'product_id','deleted_at', 'slug'

            $request->validate([
                'name' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
                'description' => 'required',
                'product' => 'required',
            ]);
    
    
            $slug = $request->name;
            $slug = preg_replace('/\s+/', '-', $slug);
            $slug = strtolower($slug);
    
            //image
            $image = $request->file('image');
            $image_name = time()."_".$image->getClientOriginalName();
            $folder = 'storage/img/body_recommendations/';
            $image->move(public_path($folder), $image_name);
            
            $recommendation = Body_Recommendation::create([
                'name' => $request->name,
                'image' => $folder.$image_name,
                'slug' => $slug,
                'description' => $request->description,
                'product_id' => $request->product,
            ]);
            
            return redirect()->route('editRecommendations', $recommendation->slug)->with([
                'success' => 'Recommendation has been added successfully <a href="'. url('offers/'.$recommendation->slug) .'" target="_blank">See Recommendation</a>'
            ]);

        } catch(\Exception $e){
            return redirect()
            ->route('createRecommendations')->with([
                'error' => 'An error occurred: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Body_Recommendation $body_Recommendation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $recommendations = new Body_Recommendation();
        $products = new Product();

        $oneRecommendation = $recommendations->where([['slug',$slug],['deleted_at',null],['status','active']])->with('product')->firstOrFail();
        $indexProducts = $products->where('deleted_at',null)->get();

        return view('pages.admin.recommendation.create',compact('indexProducts','oneRecommendation'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $recommendation = Body_Recommendation::where([['deleted_at',null],['slug',$slug]])->firstOrFail();

        $getSlug = $request->name;
        $getSlug = preg_replace('/\s+/', '-', $getSlug);
        $getSlug = strtolower($getSlug);
        
        //image
        $update_image ="";
        if($request->image){
            $image = $request->file('image');
            $image_name = time()."_".$image->getClientOriginalName();
            $folder = 'storage/img/body_recommendations/';
            $image->move(public_path($folder), $image_name);
            $update_image = $folder.$image_name;
        }else{
            $update_image = $recommendation->image;  
        }
        
        $recommendation->update([
            'name' => $request->name,
            'image' => $update_image,
            'slug' => $getSlug,
            'description' => $request->description,
            'product_id' => $request->product,
        ]);
        if ($recommendation) {
            return redirect()
                ->route('editRecommendations', $recommendation->slug)
                ->with([
                    'success' => 'Recommendation has been updated successfully'
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
        $recommendations = new Body_Recommendation();
        $recommendation = $recommendations->where([['slug',$slug],['deleted_at',null]])->firstOrFail();
        $recommendation->update([
            'deleted_at' => Carbon::now(),
            'slug' => $slug."-deleted",
        ]);
        if ($recommendation) {
            return redirect()
                ->route('indexRecommendations');
        } else {
            return redirect()
                ->back()
                ->withInput();
        }
    }
}
