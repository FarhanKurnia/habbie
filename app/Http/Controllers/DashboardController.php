<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
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
        $orders_order = $orders->where('status_order','order')->count();
        $orders_process = $orders->where('status_order','process')->count();
        $orders_failed = $orders->where('status_order','failed')->count();
        $orders_done = $orders->where('status_order','done')->count();
        $orders_revenue =  $orders->where('status_order','process')->orWhere('status_order','done')->get();
        $orders_status = array(
            'all_order'=>$orders_order+$orders_process+$orders_failed+$orders_done,
            'order' => $orders_order,
            'process'=>$orders_process,
            'failed' =>$orders_failed,
            'done' =>$orders_done);
        $ordering = $orders->where('status_order','process')->with('orderproduct','payment')->paginate(5);
        return view('test.admin.dashboard.dashboard-admin',compact('ordering','orders_revenue','orders_status','user'));
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
