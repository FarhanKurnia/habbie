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
    public function edit(Reseller $reseller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($reseller_id)
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
