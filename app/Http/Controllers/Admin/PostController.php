<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePost;
use Illuminate\Http\Request;
use App\Models\CarPost;
use App\Models\CarBrand;
use App\Models\Image;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    /**
     * Display a listing of the posts.
     *
     * $param int $page
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = $request->query('page', 1);
        $page_size = Config::get('constants.ADMIN_PAGE_SIZE');
        $total = CarPost::count();

        // DB::enableQueryLog();

        $offset = ($page - 1)*$page_size;
        $carPosts = CarPost::orderBy('id', 'DESC')
                            ->skip($offset)
                            ->take($page_size)
                            ->get();

        // dd(DB::getQueryLog());

        return view('admin.posts.index', [
            'total' => $total,
            'page' => $page,
            'page_size' => $page_size,
            'carPosts' => $carPosts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // DB::enableQueryLog();

        $carBrands = CarBrand::with('carModels')->get();

        // dd(DB::getQueryLog());

        return View('admin.posts.create', [
            'carBrands' => $carBrands
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePost  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        if (!$request->hasFile('new_photos')) {
            throw ValidationException::withMessages(['photos' => 'The photos are required to upload.']);
        }
        
        $validated = $request->validated();
        $validated['spare_key'] = !empty($request->input('spare_key')) ? true : false;
        $validated['service_book'] = !empty($request->input('service_book')) ? true : false;
        $validated['principal_warranty'] = !empty($request->input('principal_warranty')) ? true : false;
        $validated['principal_warranty_exp_date'] = !empty($request->input('principal_warranty')) ? $request->input('principal_warranty_exp_date') : null;
        $validated['user_id'] = Auth::id();
        $carPost = CarPost::create($validated);

        if ($request->hasFile('new_photos')) {
            $files = $request->file('new_photos');
            $photos = [];

            foreach ($files as $file) {
                $path = $file->store('post/photos');
                $photos[] = Image::make(['path' => $path]);
            }

            // DB::enableQueryLog();

            $carPost->images()->saveMany($photos);

            // dd(DB::getQueryLog());
        }

        $request->session()->flash('success', 'The car post was created!');

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // DB::enableQueryLog();

        $carPost = CarPost::findOrFail($id);
        $carBrands = CarBrand::with('carModels')->get();

        // dd(DB::getQueryLog());

        return view('admin.posts.edit', [
            'carPost' => $carPost,
            'carBrands' => $carBrands
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StorePost  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, $id)
    {
        if (!$request->input('old_photo_ids') && !$request->hasFile('new_photos')) {
            throw ValidationException::withMessages(['photos' => 'The photos are required to upload.']);
        }

        $carPost = CarPost::findOrFail($id);
        $validated = $request->validated();
        $validated['spare_key'] = !empty($request->input('spare_key')) ? true : false;
        $validated['service_book'] = !empty($request->input('service_book')) ? true : false;
        $validated['principal_warranty'] = !empty($request->input('principal_warranty')) ? true : false;
        $validated['principal_warranty_exp_date'] = !empty($request->input('principal_warranty')) ? $request->input('principal_warranty_exp_date') : null;
        $carPost->fill($validated);
        $carPost->save();

        // DB::enableQueryLog();

        $old_photo_ids = [];
        if ($request->input('old_photo_ids')) {
            $old_photo_ids = $request->input('old_photo_ids');
        };

        $carPost->images()->whereNotIn('id', $old_photo_ids)->delete();

        // dd(DB::getQueryLog());

        if ($request->hasFile('new_photos')) {
            $files = $request->file('new_photos');
            $photos = [];

            foreach ($files as $file) {
                $path = $file->store('post/photos');
                $photos[] = Image::make(['path' => $path]);
            }

            // DB::enableQueryLog();

            $carPost->images()->saveMany($photos);

            // dd(DB::getQueryLog());
        }

        $request->session()->flash('success', 'The car post was updated!');

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $carPost = CarPost::findOrFail($id);
        $carPost->delete();

        $request->session()->flash('success', 'The car post was deleted!');

        return redirect()->route('admin.posts.index');
    }
}
