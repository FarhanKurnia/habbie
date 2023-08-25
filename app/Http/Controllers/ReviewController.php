<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::where('deleted_at',null)->orderBy('id_review','DESC')->paginate(10);
        return view('test.admin.review.index-review-admin',compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('test.admin.review.create-review-admin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required',
                'rating' => 'required',
                'description' => 'required'
            ]);
            $user_id = Auth::user()->id_user;
            $review = Review::create([
                'name' => $request->name,
                'rating' => $request->rating,
                'description' => $request->description,
                'user_id' => $user_id
            ]);
            return redirect()->route('indexReviews');
        } catch(\Exception $e){
            return redirect()
            ->route('createReviews')->with([
                'error' => 'An error occurred: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_review)
    {
        $review = Review::where([['deleted_at',null],['id_review',$id_review]])->firstOrFail();
        return view('test.admin.review.update-review-admin',compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_review)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'rating' => 'required'
        ]);

        $id_user = Auth::user()->id_user;
        $review = Review::where([['deleted_at',null],['id_review',$id_review]])->firstOrFail();
        $review->update([
            'name' => $request->name,
            'rating' => $request->rating,
            'description' => $request->description,
            'user_id' => $id_user
        ]);
        if ($review) {
            return redirect()
                ->route('indexReviews');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }

    public function delete($id_review)
    {
        try {
            $review = Review::where([['deleted_at',null],['id_review',$id_review]])->firstOrFail();
            $review->update(['deleted_at' => Carbon::now()]);
            return redirect()->route('indexReviews');
        } catch (\Throwable $th) {
            redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => $th
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
