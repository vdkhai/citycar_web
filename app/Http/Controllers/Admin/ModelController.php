<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\CarModel;
use App\Models\CarBrand;
use Illuminate\Support\Facades\DB;

class ModelController extends Controller
{
    /**
     * Display a listing of the models.
     *
     * $param int $page
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = $request->query('page', 1);
        $page_size = Config::get('constants.PAGE_SIZE');
        $total = CarModel::count();

        // DB::enableQueryLog();

        $offset = ($page - 1)*$page_size;
        $carModels = CarModel::withCount('carPosts')
                                ->orderBy('id', 'DESC')
                                ->skip($offset)
                                ->take($page_size)
                                ->get();

        // dd($carModels[0]['carBrand']);

        // dd(DB::getQueryLog());

        return view('admin.models.index', [
            'total' => $total,
            'page' => $page,
            'page_size' => $page_size,
            'carModels' => $carModels
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

        $carBrands = CarBrand::get();

        // dd(DB::getQueryLog());

        return View('admin.models.create', [
            'carBrands' => $carBrands
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreModel  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModel $request)
    {
        $validated = $request->validated();
        $carModel = carModel::make($validated);
        $carModel->save();

        $request->session()->flash('success', 'The car model was created!');

        return redirect()->route('admin.models.index');
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

        $carModel = CarModel::findOrFail($id);
        $carBrands = CarBrand::get();

        // dd(DB::getQueryLog());

        return view('admin.models.edit', [
            'carModel' => $carModel,
            'carBrands' => $carBrands,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreModel  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreModel $request, $id)
    {
        $carModel = CarModel::findOrFail($id);
        $validated = $request->validated();
        $carModel->fill($validated);
        $carModel->save();

        $request->session()->flash('success', 'The car model was updated!');

        return redirect()->route('admin.models.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $carModel = CarModel::findOrFail($id);
        $carModel->delete();

        $request->session()->flash('success', 'The car model was deleted!');

        return redirect()->route('admin.models.index');
    }
}
