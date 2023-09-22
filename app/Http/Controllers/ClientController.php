<?php

namespace App\Http\Controllers;
use App\Models\Offer;
use App\Models\Article;
use App\Models\Body_Recommendation;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Product_Category;
use App\Models\Testimonial;
use App\Models\Review;
use App\Models\Reseller;
use App\Models\Payment;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClientController extends Controller
{
// Home funtion
    public function indexHome()
    {
        //articles
        $articles = new Article();
        //products 
        $products = new Product();
        //body_recommendation
        $bodyrecommendations = new Body_Recommendation();

        //body recommendation
        // $bodyRecommendation = $products->where([['deleted_at',null],['description','!=','']])->get()->random(3);
        $bodyRecommendation = $bodyrecommendations->where('deleted_at',null)->with('product')->get();
        //latest recommendation
        $latestRecommendation = $products->where('deleted_at',null)->with('category')->with('discount')->orderBy('discount_id', 'DESC')->limit(4)->get();
        //latest articles
        $latestArticles = $articles->where([['deleted_at',null],['categories','article']])->with('user')->orderBy('id_article','DESC')->limit(2)->get();
        return view('pages.public.home', compact('bodyRecommendation','latestRecommendation','latestArticles'));
    }

// Offers function
    public function indexOffers()
    {
        //offers
        $offers = new Offer();

        //offer
        $offers = $offers->where('deleted_at',null)->with('product')->orderBy('updated_at', 'DESC')->paginate(4);
        return view('pages.public.offers.index',compact('offers'));   
    }

// Products function
    public function indexProducts()
    {
        //products 
        $products = new Product();

        //all products
        $allProduct = $products->where('deleted_at',null)->paginate(8);
        return view('pages.public.products.index', compact('allProduct'));
    }

    public function indexProductsByCat($slug)
    {
        //products 
        $products = new Product();
        //category
        $category = Product_Category::where([['slug',$slug],['deleted_at',null]])->firstOrFail();
        $cat = $category->id_category;
        //all products
        $productsByCat = $products->where('category_id',$cat)->with('category')->paginate(8);
        return view('pages.public.products.category', compact('category','productsByCat'));
    }

    public function showProduct($slug)
    {
        //products 
        $products = new Product();
        //product
        $oneProduct = $products->where([['slug',$slug],['deleted_at',null]])->with('category')->firstOrFail();
        //latest recommendation with same category as above
        $category_id = $oneProduct->category_id;
        $latestRecommendation = $products->where([['category_id',$category_id],['deleted_at',null]])->with('category')->with('discount')->orderBy('id_product', 'DESC')->limit(4)->get();
        return view('pages.public.products.detail', compact('oneProduct','latestRecommendation'));
    }

// Categories function
    // Disable because using Product Function
    // public function indexCategories($slug)
    // {
    //     //products 
    //     $products = new Product();
    //     //category
    //     $categories = Product_Category::where('deleted_at',null)->get();
    //     $category = $categories->where([['slug',$slug],['deleted_at',null]])->firstOrFail();
    //     $cat = $category->id_category;
    //     //all products
    //     $productsByCat = $products->where('category_id',$cat)->with('category')->get();
    //     return view('test.customer.product.index-product-client', compact('category','productsByCat'));
    // }

// Testimonials function
    public function indexTestimonials(){
        //category
        $categories = Product_Category::where('deleted_at',null)->get();
        //products 
        $products = new Product();
        //testimonials
        $testimonials = new Testimonial();
        //reviews
        $reviews = new Review();

        //testimonial
        $testimonials = $testimonials->where('deleted_at',null)->get();
        //review
        $reviewList = $reviews->where('deleted_at',null)->orderBy('id_review','DESC')->paginate(6);

        $totalCountReviews = $reviews->count();
        $totalRateReviews = $reviews->sum('rating') / $totalCountReviews;
        $totalRateReviews = round($totalRateReviews, 2);

        return view('pages.public.testimonials',compact('categories','testimonials','reviewList', 'totalCountReviews', 'totalRateReviews'));
    }

// Article function
    public function indexArticles()
    {
        //articles
        $articles = new Article();

        //article
        $oneArticle = $articles->where([['deleted_at',null],['categories','article']])->first();
        //related article
        $relatedArticles = $articles->where([['deleted_at',null],['categories','article']])->orderBy('id_article','DESC')->paginate(2);
        return view('pages.public.articles.index',compact('oneArticle','relatedArticles'));
    }

    public function showArticle($slug)
    {
        //articles
        $articles = new Article();
        
        //find article 
        $oneArticle = $articles->where([['slug',$slug],['deleted_at',null],['categories','article']])->firstOrFail();
        //latest recommendation with same category as above
        $latestArticles = $articles->where([['categories','article'],['deleted_at',null]])->orderBy('id_article', 'DESC')->limit(4)->get();
        return view('pages.public.articles.detail', compact('oneArticle','latestArticles'));
    }

// Career function
    public function indexCareers()
    {
        //articles
        $articles = new Article();

        //careers
        $careers = $articles->where([['deleted_at',null],['categories','career']])->orderBy('id_article','DESC')->paginate(5);
        
        return view('pages.public.careers.index',compact('careers'));
    }

    public function showCareer($slug)
    {
        //articles
        $articles = new Article();
        
        //find career 
        $career = $articles->where([['slug',$slug],['deleted_at',null],['categories','career']])->firstOrFail();
        return view('pages.public.careers.detail', compact('career'));
    }

//test view order function
    public function order(){
        return view('test.customer.order.order-client');
    }

//Invoice Client
    public function indexInvoiceClient(){
        $user = Auth::user();
        $id_user = $user['id_user'];
        $invoices = Order::where('user_id',$id_user)->with('user','orderproduct','payment')->latest()->paginate(5);
        return view('pages.public.invoice.index',compact('invoices'));
    }

    public function showInvoiceClient($invoice){
        $user = Auth::user();
        $id_user = $user['id_user'];
        $invoices = Order::where([['invoice',$invoice],['user_id',$id_user]])->with('user','orderproduct','payment')->firstOrFail();
        $id_order = $invoices->id_order;
        $latest_payment = Payment::where('order_id',$id_order)->latest()->first();
        $orders = OrderProduct::where('order_id',$id_order)->with('product','discount',)->get();
        return view('pages.public.invoice.detail',compact('invoices','orders','latest_payment'));
    }

//Reseller 
    //test view reseller function
    public function testReseller(Request $request){
        return view('test.customer.reseller.reseller-client');
        
    }

    //join reseller function
    public function joinReseller(Request $request){
        $request->validate([
            'name' => 'required', 
            'email'=> 'required|email:rfc,dns', 
            'gender'=> 'required', 
            'phone'=> 'required', 
            'birth_date'=> 'required', 
            'identity_card'=> 'required|unique:resellers', 
            'address'=> 'required', 
            'province'=> 'required', 
            'city'=> 'required',
            'subdistrict'=> 'required',
            'postal_code'=> 'required',

        ]);
        Reseller::create([
            'name' => $request->name, 
            'email'=> $request->email, 
            'gender'=> $request->gender, 
            'phone'=> $request->phone, 
            'birth_date'=> $request->birth_date, 
            'identity_card'=> $request->identity_card, 
            'status'=> 'request', 
            'address'=> $request->address, 
            'province'=> $request->province, 
            'city'=> $request->city,
            'subdistrict'=> $request->subdistrict,
            'postal_code'=> $request->postal_code,
        ]);
        return view('test.customer.reseller.reseller-client');
    }

//Search 
    //search function
    public function search(Request $request){
        $search = $request->input('search');
        if($search){
            $products = Product::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->get();
            $article = Article::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('post', 'LIKE', "%{$search}%")
            ->get();
            $result = $products->merge($article);
            $data_count = $result->count();
            return view('test.customer.search.search-client', compact('result','data_count'));
        } else{
            return view('test.customer.search.search-client');
        }
    }

//Subscribe
    //index subscriber function
    function indexSubscriber(){
        $users = User::where('subscribe',true)->get();
        $subs = Subscriber::where('subscribe',true)->get();

        $email_user[]= [];
        foreach($users as $index => $user){
            $email_user[$index] = $user;
        };
        $email_subscriber[] = [];
        foreach($subs as $index => $sub){
            $email_subscriber[$index] = $sub;
        };
        $subscribers=(array_merge($email_user,$email_subscriber));
        return view('test.customer.subscriber.index-subscribe-client',compact('subscribers'));
        
    }
    //subscribe function
    function subscribe(Request $request){
        $request->validate([
            'email' => 'required|max:255|email:dns',
        ]);
        $user = User::where('email',$request->email)->first();
        $subscriber = Subscriber::where('email',$request->email)->first();
        if ($user != null) {
            $user->update([
                'subscribe' => true
            ]);
            return with('Email successfully subscribed');
        } elseif ($subscriber == null ) {
            Subscriber::create([
                'email' => $request->email,
                'subscribe' => true
            ]);
            return with('Email successfully subscribed');
        } elseif ($subscriber != null){
            $subscriber->update([
                'subscribe' => true
            ]);
            return with('Email successfully subscribed');
        } else{
            return with('Email already subscribed');
        }
    }
    //unsubscribe function
    function unsubscribe(Request $request){
        $request->validate([
            'email' => 'required|max:255|email:dns',
        ]);
        $email = $request->email;
        // if ($email) {
            $user = User::where('email',$email)->first();
            $subscriber = Subscriber::where('email',$email)->first();
            if ($user != null && $user->subscribe == true){
                $user->update([
                    'subscribe' => false,
                ]);
                return view('pages.public.unsubscribe')->with('response','Kamu berhasil berhenti berlangganan dan selanjutnya kamu tidak akan menerima email penawaran dari');
            }elseif ($subscriber != null && $subscriber->subscribe == true) {
                $subscriber->update([
                    'subscribe' => false
                ]);
                return view('pages.public.unsubscribe')->with('response','Kamu berhasil berhenti berlangganan dan selanjutnya kamu tidak akan menerima email penawaran dari');
                // return view('pages.public.unsubscribe')->with('response','Your Email successfully unsubscribed and you will not receive email offers from');
            } elseif ($user!= null && $user->subscribe == false || $subscriber!=null && $subscriber->subscribe == false){
                return view('pages.public.unsubscribe')->with('response','Email kamu tidak terdaftar berlangganan, daftar sekarang untuk mendapatkan penawaran menarik dari');
            } else{
                return view('pages.public.unsubscribe')->with('response','Email kamu tidak terdaftar, daftar sekarang untuk mendapatkan penawaran menarik dari');
                // return view('pages.public.unsubscribe')->with('response','Email not subscribed yet, you need to subscribe to receive email offers from');
            }
        // }else{
        //     return view('pages.public.unsubscribe-form');
        // }
        
    }
}
