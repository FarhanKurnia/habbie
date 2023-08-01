<?php

namespace App\Http\Controllers;
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
        $articles = new Article();
        //careers
        $careers = $articles->where([['deleted_at',null],['categories','career']])->orderBy('id_article','DESC')->paginate(5);
        return view('test.admin.career.index-career-admin',compact('careers'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('test.admin.career.create-career-admin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $slug = $request->title;
        $slug = preg_replace('/\s+/', '-', $slug);
        $slug = strtolower($slug);
        $excerpt = Str::limit($request->post,250);

        Article::create([
            'title' => $request->title,
            'post' => $request->post,
            'excerpt' => $excerpt,
            'image' => $request->image,
            'slug' => $slug,
            'categories' => 'career',
            'user_id' => $request->user_id,
        ]);
        return redirect()->route('indexCareers');    
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

        $career = $articles->where([['slug',$slug],['deleted_at',null],['categories','career']])->with('user')->firstOrFail();
        return view('test.admin.career.update-career-admin',compact('career'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        //articles
        $articles = new Article();
        $getSlug = $request->title;
        $getSlug = preg_replace('/\s+/', '-', $getSlug);
        $getSlug = strtolower($getSlug);
        $excerpt = Str::limit($request->post,250);

        $career = $articles->where([['deleted_at',null],['slug',$slug],['categories','career']])->firstOrFail();
        $career->update([
            'title' => $request->title,
            'post' => $request->post,
            'excerpt' => $excerpt,
            'image' => $request->image,
            'slug' => $getSlug,
            'categories' => 'career',
            'user_id' => $request->user_id,
        ]);
        if ($career) {
            return redirect()
                ->route('indexCareers');
        } else {
            return redirect()
                ->back()
                ->withInput();
        }    }

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
