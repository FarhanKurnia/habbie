<?php

namespace App\Http\Controllers;

use App\Models\Reseller;
use Illuminate\Http\Request;
use LDAP\Result;

class ResellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resellers = Reseller::orderBy('created_at','DESC')->paginate(10);
        return view('test.admin.reseller.index-reseller-admin',compact('resellers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Reseller $reseller)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($reseller_id)
    {
        $reseller = Reseller::where('reseller_id',$reseller_id)->firstOrFail();
        return view('test.admin.reseller.update-reseller-admin',compact('reseller'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $reseller_id)
    {
        // dd($request);
        $request->validate([
            'name' => 'required', 
            'gender'=> 'required', 
            'phone'=> 'required', 
            'birth_date'=> 'required', 
            'identity_card'=> 'required', 
            'address'=> 'required', 
            'province'=> 'required', 
            'city'=> 'required',
            'subdistrict'=> 'required',
            'postal_code'=> 'required',

        ]);
        $reseller = Reseller::where('reseller_id',$reseller_id)->firstOrFail();
        $reseller->update([
            'name' => $request->name, 
            'gender'=> $request->gender, 
            'phone'=> $request->phone, 
            'birth_date'=> $request->birth_date, 
            'identity_card'=> $request->identity_card, 
            'address'=> $request->address, 
            'province'=> $request->province, 
            'city'=> $request->city,
            'subdistrict'=> $request->subdistrict,
            'postal_code'=> $request->postal_code,
        ]);
        return redirect()->route('indexResellers');
    }


    public function changeStatus($reseller_id)
    {
        $reseller = Reseller::where('reseller_id',$reseller_id)->firstOrFail();
        if($reseller->status == 'active'){
            $reseller->update([
                'status' => 'non-active'
            ]);
        }else{
            $reseller->update([
                'status' => 'active'
            ]);
        }
        return redirect()->route('indexResellers');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reseller $reseller)
    {
        //
    }
}
