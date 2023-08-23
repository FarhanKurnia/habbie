<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use App\Models\Order;
use App\Models\Product;
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
        $customers = User::where('role_id',2)->count();
        $products = new Product();
        $all_products = $products->where('deleted_at',null)->count();
        $flower_products = $products->where([['deleted_at',null],['category_id',1]])->count();
        $tea_products = $products->where([['deleted_at',null],['category_id',2]])->count();
        $saffron_products = $products->where([['deleted_at',null],['category_id',3]])->count();
        $vanilla_products = $products->where([['deleted_at',null],['category_id',4]])->count();
        $product_categories = array(
            'all' => $all_products,
            'flower'=>$flower_products,
            'tea' => $tea_products,
            'saffron'=>$saffron_products,
            'vanilla' =>$vanilla_products
        );
        
        
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

        //Pattern time graph
        $this_year = Carbon::today()->addYears(0)->format('Y');
        $january = Carbon::create($this_year, 1)->format('Y-m');
        $february = Carbon::create($this_year, 2)->format('Y-m');
        $march = Carbon::create($this_year, 3)->format('Y-m');
        $april = Carbon::create($this_year, 4)->format('Y-m');
        $may = Carbon::create($this_year, 5)->format('Y-m');
        $june = Carbon::create($this_year, 6)->format('Y-m');
        $july = Carbon::create($this_year, 7)->format('Y-m');
        $august = Carbon::create($this_year, 8)->format('Y-m');
        $september = Carbon::create($this_year, 9)->format('Y-m');
        $october = Carbon::create($this_year, 10)->format('Y-m');
        $november = Carbon::create($this_year, 11)->format('Y-m');
        $december = Carbon::create($this_year, 12)->format('Y-m');

        //Graph Monthly
        $graph_january = $orders->where('created_at','LIKE',"%{$january}%")->count();
        $graph_february = $orders->where('created_at','LIKE',"%{$february}%")->count();
        $graph_march = $orders->where('created_at','LIKE',"%{$march}%")->count();
        $graph_april = $orders->where('created_at','LIKE',"%{$april}%")->count();
        $graph_may = $orders->where('created_at','LIKE',"%{$may}%")->count();
        $graph_june = $orders->where('created_at','LIKE',"%{$june}%")->count();
        $graph_july = $orders->where('created_at','LIKE',"%{$july}%")->count();
        $graph_august = $orders->where('created_at','LIKE',"%{$august}%")->count();
        $graph_september = $orders->where('created_at','LIKE',"%{$september}%")->count();
        $graph_october = $orders->where('created_at','LIKE',"%{$october}%")->count();
        $graph_november = $orders->where('created_at','LIKE',"%{$november}%")->count();
        $graph_december = $orders->where('created_at','LIKE',"%{$december}%")->count();
        
        $graph_montly = array(
            'january'=>$graph_january,
            'february'=>$graph_february,
            'march'=>$graph_march,
            'april'=>$graph_april,
            'may'=>$graph_may,
            'june'=>$graph_june,
            'july'=>$graph_july,
            'august'=>$graph_august,
            'september'=>$graph_september,
            'october'=>$graph_october,
            'november'=>$graph_november,
            'december'=>$graph_december,

        );

        
        // return view('test.admin.dashboard.dashboard-admin',compact('ordering','orders_revenue','orders_status','user'));
        return view('pages.admin.dashboard',compact('ordering','orders_revenue','orders_status','user','customers','graph_montly','product_categories'));
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
