<?php

namespace App\Http\Controllers;
use Twilio\Rest\Client;
use App\Models\FirebaseSettings;
use App\Models\verification_process;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class FirebaseSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function show(FirebaseSettings $firebaseSettings)
    {
        $allOrder = FirebaseSettings::paginate(5);
        return view('admin.firebasesetting',compact('allOrder'));
    }

    public function changeStatus(Request  $request)
    {
        $user = FirebaseSettings::find($request->user_id);
        $user->status = $request->status;
        $user->save();
        return response()->json(['success'=>'Status change successfully.']);
    }

    public function verificationprocess(Request  $request)
    {

        $data = $request->all();
        verification_process::updateOrCreate(
            ['id' => 1],
            $data
        );                
        return response()->json(['success'=>'Status change successfully.']);
    }

    public function create(Request $request)
    {
        if(Auth::check()){
            $data = $request->all();
            if(!empty($data)){
                FirebaseSettings::create($data);
                return back()->with('success', 'Your Firebase Setting Added Successfully!');
            }
        }else{
            return redirect('login');
        }
    }

    public function sms(Request $request)
    {
        $sid    = "ACf9ae5f8d3a2b77ddf00b6d664b4397ce";
        $token  = "1b90fc11b1c5c041efe816c1f117e948";
        $twilio = new Client($sid, $token);
        $otp = rand(123121,787912);
        $message = $twilio->messages
            ->create("+919877030523",
               array(
                   "messagingServiceSid" => "MG4b32fef11c90b754f0f8445b6c64cc5e",
                   "body" => "Your OTP is .'$otp'"
               )
        );
        if($message){
            User::where("id", Auth::id())->limit(1)->update(["OTP" => $otp]);
        }
        return redirect()->route('sendverify')->with(['phone_number' => $request->phone]);
    }

    protected function verify(Request $request)
    {
        $check_code = User::where("contact", $request->phone_number)->first();
        $OTP = $check_code['OTP'];
        $deleteotp = '';
        if ($request->verification_code == $OTP) {
            User::where("contact", $request->phone_number)->limit(1)->update(["OTP" => $deleteotp]);
            return redirect()->route('home')->with(['message' => 'Phone number verified']);
        }else{
            return back()->with(['phone_number' => $data['phone_number'], 'error' => 'Invalid verification code entered!']);
        }
    }

    Public function sendverify(){
        $contact = session('phone_number');
        return view('admin.verify',compact('contact'));        
    }
}
