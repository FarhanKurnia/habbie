<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::where('deleted_at',null)->with('user')->paginate(5);
        return view('test.admin.testimonial.index-testimonial-admin',compact('testimonials'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('test.admin.testimonial.create-testimonial-admin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'description' => 'required',
            'profesi' => 'required',
            'lokasi' => 'required',
        ]);

        //user
        $user_id = Auth::user()->id_user;

        //slug
        $name = $request->name;
        $profesi = $request->profesi;
        $lokasi = $request->lokasi;
        $slug = $name.'-'.$profesi.'-'.$lokasi;
        $slug = preg_replace('/\s+/', '-', $slug);
        $slug = strtolower($slug);

        //image
	    $image = $request->file('image');
	    $image_name = time()."_".$image->getClientOriginalName();
	    $folder = 'storage/img/testimonials/';
        $image->move(public_path($folder), $image_name);

        Testimonial::create([
            'name' => $name,
            'profesi' => $profesi,
            'lokasi' => $lokasi,
            'slug' => $slug,
            'description' => $request->description,
            'image' => $folder.$image_name,
            'user_id' => $user_id,
        ]);
        return redirect()->route('indexTestimonials');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $testimonial = Testimonial::where([['deleted_at',null],['slug',$slug]])->with('user')->firstOrFail();
        return view('test.admin.testimonial.show-testimonial-admin',compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $testimonial = Testimonial::where([['deleted_at',null],['slug',$slug]])->firstOrFail();
        return view('test.admin.testimonial.update-testimonial-admin',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'description' => 'required',
            'profesi' => 'required',
            'lokasi' => 'required',
        ]);

        //Testimonial
        $testimonial = Testimonial::where([['deleted_at',null],['slug',$slug]])->firstOrFail();

        //user
        $user_id = Auth::user()->id_user;

        //slug
        $name = $request->name;
        $profesi = $request->profesi;
        $lokasi = $request->lokasi;
        $slug = $name.'-'.$profesi.'-'.$lokasi;
        $slug = preg_replace('/\s+/', '-', $slug);
        $slug = strtolower($slug);
        
        //image
        $update_image ="";
        if($request->image){
            $image = $request->file('image');
            $image_name = time()."_".$image->getClientOriginalName();
            $folder = 'storage/img/testimonials/';
            $image->move(public_path($folder), $image_name);
            $update_image = $folder.$image_name;
        }else{
            $update_image = $testimonial->image;  
        }

        $testimonial->update([
            'name' => $request->name,
            'image' => $update_image,
            'slug' => $slug,
            'description' => $request->description,
            'profesi' => $profesi,
            'lokasi' => $lokasi,
            'user_id' => $user_id,
        ]);
        if ($testimonial) {
            return redirect()
                ->route('indexTestimonials')
                ->with([
                    'success' => 'Post has been updated successfully'
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
        //products
        $testimonial = Testimonial::where([['slug',$slug],['deleted_at',null]])->firstOrFail();
        $testimonial->update([
            'deleted_at' => Carbon::now(),
            'slug' => $slug."-deleted",
        ]);
        if ($testimonial) {
            return redirect()
                ->route('indexTestimonials');
        } else {
            return redirect()
                ->back()
                ->withInput();
        }
    }
}
