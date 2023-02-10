<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Order;
use App\Models\ipadrress;
use Auth;
use DB;
use Illuminate\Http\Request;
use \Crypt;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = User::where('id', Auth::id())->first();
        $countorder = order::where('user_id',  Auth::id())->count();
        $countuser = User::select('id')->count();
        $main = $data['rank'];

        // $visitcount = ipadrress::all()->groupBy('IP');                
        // $visitcount = $visitcount->count();

        $data = Auth::id();
        $checkauth = User::where('id', $data)->first();
        $admin = $checkauth->role;

        $visitcount = ipadrress::select('IP')->count();

        $user = User::where('id', Auth::id())->first()->suponser_id;
        $finalid = $user;

        return view('home', compact('main','countorder','countuser', 'visitcount', 'admin', 'finalid'));
    }
}
