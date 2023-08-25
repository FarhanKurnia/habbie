<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where([['deleted_at',null],['role_id',2]])->with('role')->paginate(10);
        return view('test.admin.user.index-user-admin',compact('users'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($customer_id)
    {

        $user = User::where([['deleted_at',null],['customer_id',$customer_id]])->with('role')->firstOrFail();
        $user_id = $user->id_user;
        $orders = Order::where([['user_id',$user_id]])->with('orderproduct','payment')->get();
        return view('test.admin.user.show-user-admin',compact('user','orders'));
    }

    public function profile(){
        $id_user = Auth::user()->id_user;
        $user = User::where('id_user',$id_user)->firstOrFail();
        return view('test.customer.user.profile',compact('user'));
        
    }

    public function updateProfile(Request $request){
        $request->validate([
            'name'=> 'required'
        ]);
        $id_user = Auth::user()->id_user;
        $user = User::where('id_user',$id_user)->firstOrFail();
        $user->update([
            'name' => $request->name
        ]);
        return redirect()->route('profile');
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($customer_id)
    {
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
