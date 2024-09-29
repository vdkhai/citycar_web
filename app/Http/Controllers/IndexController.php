<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\CarPost;

use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Search car.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function search(Request $request)
    {
        $page = $request->query('page', 1);
        $page_size = Config::get('constants.PAGE_SIZE');
        
        // DB::enableQueryLog();

        $keywords = $request->query('keywords', '');
        $total = CarPost::join('car_models', 'car_posts.car_model_id', '=', 'car_models.id')
                            ->join('car_brands', 'car_models.car_brand_id', '=', 'car_brands.id')
                            ->where('car_posts.title', 'like', "%$keywords%")
                            ->orWhere(function ($query) use ($keywords) {
                                $query->whereNotNull('registration_date')
                                    ->whereYear('registration_date', '=', "$keywords");
                            })
                            ->orWhere('car_models.title', 'like', "%$keywords%")
                            ->orWhere('car_brands.name', 'like', "%$keywords%")
                            ->count();

        $offset = ($page - 1)*$page_size;
        $carPosts = CarPost::select('car_posts.*', 'car_models.title as model', 'car_brands.name as brand')
                            ->join('car_models', 'car_posts.car_model_id', '=', 'car_models.id')
                            ->join('car_brands', 'car_models.car_brand_id', '=', 'car_brands.id')
                            ->where('car_posts.title', 'like', "%$keywords%")
                            ->orWhere(function ($query) use ($keywords) {
                                $query->whereNotNull('registration_date')
                                    ->whereYear('registration_date', '=', "$keywords");
                            })
                            ->orWhere('car_models.title', 'like', "%$keywords%")
                            ->orWhere('car_brands.name', 'like', "%$keywords%")
                            ->orderBy('car_posts.id', 'DESC')
                            ->with('images')
                            ->skip($offset)
                            ->take($page_size)
                            ->get();

        // dd($carPosts[0]['images']);
        // $carPosts[0]['images'][0];
        // $carPosts[1]['images'][0];

        // dd(DB::getQueryLog());

        // return view('search_improve', [
        //     'total' => $total,
        //     'page' => $page,
        //     'page_size' => $page_size,
        //     'carPosts' => $carPosts
        // ]);

        return view('search', [
            'total' => $total,
            'page' => $page,
            'page_size' => $page_size,
            'carPosts' => $carPosts
        ]);
    }

    /**
     * Search car.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function detail($id) {
        // DB::enableQueryLog();

        $carPost = CarPost::findOrFail($id);

        // dd(DB::getQueryLog());

        return view('detail', [
            'carPost' => $carPost,
        ]);
    }
}
