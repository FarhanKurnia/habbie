<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id_user = Auth::user()->id_user;

        $user = User::where('id_user',$id_user)->with('role')->firstOrFail();
        $orders = new Order();
        $orders_pending = $orders->where('status','pending')->count();
        $orders_process = $orders->where('status','process')->count();
        $orders_done = $orders->where('status','done')->count();
        $orders_status = array(
            'pending'=>$orders_pending,
            'process'=>$orders_process,
            'done' =>$orders_done);
        return view('test.admin.dashboard.dashboard-admin',compact('orders_status','user'));
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
