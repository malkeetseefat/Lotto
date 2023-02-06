<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

   
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function sponser_id($id)
    {
        $data = decrypt($id);
        //$id = Auth::id();
        // $user = User::where('id', $id)->first()->suponser_id;
        return view('registers',compact('data'));
    }
 
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {      
        $data['autogen_suponser_id']  =  rand(0, 99999);
        $data['wallet_points']  =  rand(0, 10);
        $data['role']  =  0;
        $suponser_id = $data['suponser_id'];

        if (!empty($data['suponser_id'])) {
            $checkswallet = User::where('suponser_id', $data['suponser_id'])->first()->wallet_points;
            $calculate = $checkswallet + $data['wallet_points'];
            $wallet_Update = User::where("suponser_id", $data['suponser_id'])->limit(1)->update(["wallet_points" => $calculate]);       
            $count = User::where('suponser_id','=',$suponser_id)->first();
        } else{
            $count = 0;
        }


        if ($count > '0') {

            //Rank Functionality
            $countparent_id = User::where('parent_id', '=', $suponser_id)->count();
            if($countparent_id = '10'){
                User::where("suponser_id", $data['suponser_id'])->limit(1)->update(["rank" => '1']);
                $incrementcoins = $checkswallet + 100;
                $wallet_Update = User::where("suponser_id", $data['suponser_id'])->limit(1)->update(["wallet_points" => $incrementcoins]);       

            }
            if($countparent_id = '20'){
                User::where("suponser_id", $data['suponser_id'])->limit(1)->update(["rank" => '2']);
                $incrementcoins = $checkswallet + 200;
                $wallet_Update = User::where("suponser_id", $data['suponser_id'])->limit(1)->update(["wallet_points" => $incrementcoins]);
            }
            //End Rank Functionality
        }

        $email = $data['email'];
        $emaildata = array(
            'email' => $data['email'],
            'default_password' => $data['password'],
        );      
        
        if($count > '0'){
            Mail::to($email)->send(new sendMail($emaildata));
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'suponser_id' => $data['autogen_suponser_id'],
                'parent_id' => $data['suponser_id'],
                'password' => Hash::make($data['password']),
                'default_password' => $data['password'],
                'role' => 0,
                'contact' => $data['contact'],
            ]);
        }else{
            Mail::to($email)->send(new sendMail($emaildata));
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'suponser_id' => $data['autogen_suponser_id'],
                'parent_id' => '0',
                'password' => Hash::make($data['password']),
                'default_password' => $data['password'],
                'role' => 0,
                'contact' => $data['contact'],
            ]);
        }

    }
}