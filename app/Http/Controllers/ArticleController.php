<?php

namespace App\Http\Controllers;

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
            $slug = $request->title;
            $slug = preg_replace('/\s+/', '-', $slug);
            $slug = strtolower($slug);
            $excerpt = Str::limit($request->post,250);
    
            $article = Article::create([
                'title' => $request->title,
                'post' => $request->post,
                'excerpt' => $excerpt,
                'image' => $request->image,
                'slug' => $slug,
                'categories' => $request->categories,
                'user_id' => $request->user_id,
            ]);

            return redirect()->route('createArticles')->with([
                'success' => 'New article created successfully <a href="'. url('products/'.$article->slug) .'" target="_blank">See Article</a>'
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
        //articles
        $articles = new Article();
        $getSlug = $request->title;
        $getSlug = preg_replace('/\s+/', '-', $getSlug);
        $getSlug = strtolower($getSlug);
        $excerpt = Str::limit($request->post,250);

        $article = $articles->where([['deleted_at',null],['slug',$slug],['categories','article']])->firstOrFail();
        $article->update([
            'title' => $request->title,
            'post' => $request->post,
            'excerpt' => $excerpt,
            'image' => $request->image,
            'slug' => $getSlug,
            'categories' => $request->categories,
            'user_id' => $request->user_id,
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
