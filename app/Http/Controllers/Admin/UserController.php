<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * $param int $page
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = $request->query('page', 1);
        $page_size = Config::get('constants.ADMIN_PAGE_SIZE');
        $total = User::count();

        // DB::enableQueryLog();

        $offset = ($page - 1)*$page_size;
        $users = User::withCount('carPosts')
                                ->orderBy('id', 'ASC')
                                ->skip($offset)
                                ->take($page_size)
                                ->get();

        // dd($users);

        // dd(DB::getQueryLog());

        return view('admin.users.index', [
            'total' => $total,
            'page' => $page,
            'page_size' => $page_size,
            'users' => $users
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if (!$user['is_admin']) {
            $user->delete();
            $request->session()->flash('success', 'The user was deleted!');
        } else {
            $request->session()->flash('danger', 'The admin user cannot be deleted');
        }
        
        return redirect()->route('admin.users.index');
    }
}
