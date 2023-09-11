<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //articles
        return view('pages.admin.careers.index');

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.careers.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'post' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            ]);

            //user_id
            $user_id = Auth::user()->id_user;

            //slug
            $slug = $request->title;
                $slug = preg_replace('/\s+/', '-', $slug);
                $slug = strtolower($slug);
                $excerpt = $request->excerpt ? $request->excerpt : Str::limit($request->post,250);

    
            //image
            $image = $request->file('image');
            $image_name = time()."_".$image->getClientOriginalName();
            $folder = 'storage/img/careers/';
            $image->move(public_path($folder), $image_name);

            $article = Article::create([
                'title' => $request->title,
                'post' => $request->post,
                'excerpt' => $excerpt,
                'image' => $folder.$image_name,
                'slug' => $slug,
                'categories' => 'career',
                'user_id' => $user_id,
                'image' => $folder.$image_name,
            ]);

            return redirect()->route('editCareers', $article->slug)->with([
                'success' => 'New carrer created successfully <a class="font-bold text-pink-primary" href="'. url('media/'.$article->slug) .'" target="_blank">See Career</a>'
            ]);

        } catch (\Exception $e){
            return redirect()
            ->route('createCareers')->with([
                'error' => 'An error occurred: ' . $e->getMessage()
            ]);
        }  
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        //articles
        $articles = new Article();
    
        //find career 
        $career = $articles->where([['slug',$slug],['deleted_at',null],['categories','career']])->firstOrFail();
        return view('test.admin.career.show-career-admin', compact('career'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        //articles
        $articles = new Article();

        $oneArticle = $articles->where([['slug',$slug],['deleted_at',null],['categories','career']])->with('user')->firstOrFail();
        return view('pages.admin.careers.create',compact('oneArticle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {

        $request->validate([
            'title' => 'required',
            'post' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',

        ]);
        //user_id
        $user_id = Auth::user()->id_user;

        //articles
        $article = Article::where([['deleted_at',null],['slug',$slug],['categories','career']])->firstOrFail();

        //slug
        $getSlug = $request->title;
        $getSlug = preg_replace('/\s+/', '-', $getSlug);
        $getSlug = strtolower($getSlug);
        $excerpt = $request->excerpt ? $request->excerpt : Str::limit($request->post,250);

        //image
        $update_image ="";
        if($request->image){
            $image = $request->file('image');
	        $image_name = time()."_".$image->getClientOriginalName();
	        $folder = 'storage/img/careers/';
            $image->move(public_path($folder), $image_name);
            $update_image = $folder.$image_name;
        }else{
            $update_image = $article->image;  
        }

        $article->update([
            'title' => $request->title,
            'post' => $request->post,
            'excerpt' => $excerpt,
            'image' => $update_image,
            'slug' => $getSlug,
            'categories' => 'career',
            'user_id' => $user_id,
        ]);
        if ($article) {

            return redirect()
            ->route('editCareers', $article->slug)
            ->with([
                'success' => 'Updated successfully'
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
        //articles
        $articles = new Article();
        $carrer = $articles->where([['slug',$slug],['deleted_at',null],['categories','career']])->firstOrFail();
        $carrer->update([
            'deleted_at' => Carbon::now(),
            'slug' => $slug."-deleted",
        ]);
        if ($carrer) {
            return redirect()
                ->route('indexCareers');
        } else {
            return redirect()
                ->back()
                ->withInput();
        }    }
}
