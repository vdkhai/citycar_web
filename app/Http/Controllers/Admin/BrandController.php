<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\CarBrand;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    /**
     * Display a listing of the brands.
     *
     * $param int $page
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = $request->query('page', 1);
        $page_size = Config::get('constants.ADMIN_PAGE_SIZE');
        $total = CarBrand::count();

        // DB::enableQueryLog();

        $offset = ($page - 1)*$page_size;
        $carBrands = CarBrand::withCount('carModels')
                                ->orderBy('id', 'DESC')
                                ->skip($offset)
                                ->take($page_size)
                                ->get();

        // dd($carBrands);

        // dd(DB::getQueryLog());

        return view('admin.brands.index', [
            'total' => $total,
            'page' => $page,
            'page_size' => $page_size,
            'carBrands' => $carBrands
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBrand  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrand $request)
    {
        $validated = $request->validated();
        $carBrand = carBrand::create($validated);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $path = $file->storeAs('brand/logos', $carBrand['name'] . '_' . $carBrand['id'] . '.' . $file->guessExtension());
            
            $carBrand->image()->save(
                Image::make(['path' => $path])
            );
        }

        $request->session()->flash('success', 'The car brand was created!');

        return redirect()->route('admin.brands.index');
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

        $carBrand = CarBrand::findOrFail($id);

        // $image = $carBrand['image'];
        // dd($carBrand['image']);

        // dd(DB::getQueryLog());

        return view('admin.brands.edit', [
            'carBrand' => $carBrand
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreBrand  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBrand $request, $id)
    {
        $carBrand = CarBrand::findOrFail($id);
        $validated = $request->validated();
        $carBrand->fill($validated);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $path = $file->storeAs('brand/logos', $carBrand['name'] . '_' . $carBrand['id'] . '.' . $file->guessExtension());

            if ($carBrand['image']) {
                if ($carBrand['image']['path'] != $path) {
                    Storage::delete($carBrand['image']['path']);
                }
                
                $carBrand['image']['path'] = $path;
                $carBrand['image']->save();
            } else {
                $carBrand->image()->save(
                    Image::make(['path' => $path])
                );
            }
        }

        $carBrand->save();
        $request->session()->flash('success', 'The car brand was updated!');

        return redirect()->route('admin.brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $carBrand = CarBrand::findOrFail($id);
        $carBrand->delete();

        $request->session()->flash('success', 'The car brand was deleted!');

        return redirect()->route('admin.brands.index');
    }
}
