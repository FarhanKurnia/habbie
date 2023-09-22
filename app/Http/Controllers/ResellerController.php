<?php

namespace App\Http\Controllers;

use App\Models\Reseller;
use App\Models\TermReseller;
use Illuminate\Http\Request;
use LDAP\Result;

class ResellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.resellers.index');
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
        return view('pages.admin.resellers.edit',compact('reseller'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $reseller_id)
    {
        try {
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
                'status' => 'required'
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
                'status' => $request->status
            ]);

            return redirect()
                ->route('editResellers', $reseller->reseller_id)
                ->with([
                    'success' => 'Reseller data has been updated successfully'
                ]);

        } catch(Exception $e){
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
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

    public function setTermReseller(Request $request, $slug){
        $request->validate([
            'information' => 'required',
            'term' => 'required']
        );
        $term_reseller = TermReseller::where('slug',$slug)->firstOrFail();
        $term_reseller->update([
            'information' => $request->information,
            'term' => $request->term
        ]);
        return view('test.admin.reseller.get-term-reseller-admin',compact('term_reseller'));

    }

    public function getTermReseller($slug){
        $term_reseller = TermReseller::where('slug',$slug)->firstOrFail();
        return view('test.admin.reseller.get-term-reseller-admin',compact('term_reseller'));
    }

    public function membership(){
       $term = TermReseller::first();
       return view('pages.public.membership',compact('term'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reseller $reseller)
    {
        //
    }
}
