<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //discounts
        $discounts = new Discount();
        $indexDiscounts = $discounts->where('deleted_at',null)->orderBy('id_discount','DESC')->paginate(10);
    
        return view('test.admin.discount.index-discount-admin', compact('indexDiscounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('test.admin.discount.create-discount-admin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $slug = $request->name;
        $slug = preg_replace('/\s+/', '-', $slug);
        $slug = strtolower($slug);

        Discount::create([
            'name' => $request->name,
            'rule' => $request->rule,
            'slug' => $slug,
            'description' => $request->description,
            'status' => 'active',
        ]);
        return redirect()->route('indexDiscounts');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        //discounts
        $discounts = new Discount();
        $oneDiscount = $discounts->where([['slug',$slug],['deleted_at',null]])->firstOrFail();
        return view('test.admin.discount.show-discount-admin', compact('oneDiscount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        //discounts
        $discounts = new Discount();
        $oneDiscount = $discounts->where([['slug',$slug],['deleted_at',null]])->firstOrFail();

        return view('test.admin.discount.update-discount-admin',compact('oneDiscount'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        //discounts
        $discounts = new Discount();
        $getSlug = $request->name;
        $getSlug = preg_replace('/\s+/', '-', $getSlug);
        $getSlug = strtolower($getSlug);
        $discount = $discounts->where([['deleted_at',null],['slug',$slug]])->firstOrFail();
        $discount->update([
            'name' => $request->name,
            'rule' => $request->rule,
            'slug' => $getSlug,
            'description' => $request->description,
            'status' => $request->status,
        ]);
        if ($discount) {
            return redirect()
                ->route('indexDiscounts');
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
        //discounts
        $discounts = new Discount();
        //products
        $products = new Product();
        $discount = $discounts->where([['slug',$slug],['deleted_at',null]])->firstOrFail();
        $id_discount=$discount->id_discount;
        $indexProducts = $products->where('discount_id',$id_discount)->get();
        if($indexProducts != null){
            foreach($indexProducts as $product){
                $product->update([
                    'discount_id' => null
                ]);
            }
        }
        
        $discount->update([
            'deleted_at' => Carbon::now(),
            'slug' => $slug."-deleted",
        ]);

        if ($discount) {
            return redirect()
                ->route('indexDiscounts');
        } else {
            return redirect()
                ->back()
                ->withInput();
        }
    }
}
