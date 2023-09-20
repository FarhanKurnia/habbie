<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //articles
        // $articles = new Article();

        // $indexArticles = $articles->where([['deleted_at',null],['categories','article']])->with('user')->orderBy('id_article','DESC')->paginate(10);
        // return view('test.admin.article.index-article-admin', compact('indexArticles'));

        return view('pages.admin.articles.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('test.admin.article.create-article-admin');
        return view('pages.admin.articles.create');

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
            $folder = 'storage/img/articles/';
            $image->move(public_path($folder), $image_name);

            $article = Article::create([
                'title' => $request->title,
                'post' => $request->post,
                'excerpt' => $excerpt,
                'image' => $folder.$image_name,
                'slug' => $slug,
                'categories' => 'article',
                'user_id' => $user_id,
                'image' => $folder.$image_name,
            ]);

            return redirect()->route('editArticles', $article->slug)->with([
                'success' => 'New article created successfully <a class="font-bold text-pink-primary" href="'. url('media/'.$article->slug) .'" target="_blank">See Article</a>'
            ]);

            // return redirect()->route('indexArticles');
        } catch(\Exception $e){
            return redirect()
            ->route('createArticles')->with([
                'error' => 'An error occurred: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        //Articles
        $articles = new Article();
        $oneArticle = $articles->where([['slug',$slug],['deleted_at',null]])->firstOrFail();
        return view('test.admin.article.show-article-admin', compact('oneArticle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        //articles
        $articles = new Article();

        $oneArticle = $articles->where([['slug',$slug],['deleted_at',null],['categories','article']])->with('user')->firstOrFail();
        return view('pages.admin.articles.create',compact('oneArticle'));
        // return view('test.admin.article.update-article-admin',compact('oneArticle'));

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
        $article = Article::where([['deleted_at',null],['slug',$slug],['categories','article']])->firstOrFail();

        //slug
        $getSlug = $request->title;
        $getSlug = preg_replace('/\s+/', '-', $getSlug);
        $getSlug = strtolower($getSlug);
        $excerpt = $request->excerpt ? $request->excerpt : Str::limit($request->post,250);
        // $excerpt = Str::limit($request->post,250);


        //image
        $update_image ="";
        if($request->image){
            $image = $request->file('image');
	        $image_name = time()."_".$image->getClientOriginalName();
	        $folder = 'storage/img/articles/';
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
            'categories' => 'article',
            'user_id' => $user_id,
        ]);
        if ($article) {

            return redirect()
            ->route('editArticles', $article->slug)
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
        $article = $articles->where([['slug',$slug],['deleted_at',null],['categories','article']])->firstOrFail();
        $article->update([
            'deleted_at' => Carbon::now(),
            'slug' => $slug."-deleted",
        ]);
        if ($article) {
            return redirect()
                ->route('indexArticles');
        } else {
            return redirect()
                ->back()
                ->withInput();
        }
    }
}
