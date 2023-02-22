<?php

namespace App\Http\Controllers;

use App\Models\notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\bulksend;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function send_notifications(Request $request)
    {
        $data = $request->all();

        $query = new notifications;
        $query->client_id = $request->input('client_id');
        $query->admin_id = $request->input('admin_id');
        $query->subject = $request->input('subject');
        $query->dateTime = date('Y-m-d H:i:s');
        $query->status = '0';
        $query->save();

        if($query){
            return response()->json([
                'status' => 'success', 
                'message' => 'Information saved successfully!'
            ], 200);
        }else{
            return response()->json([
                'status' => 'error', 
                'message' => 'Something went wrong!'
            ], 400);
        }        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data  = $request->all();
        $userstatus = notifications::where('id', $data['id'])->first();

        $statusread = notifications::where("id", $data['id'])->limit(1)->update(["status" => '1']);

        if (!empty($userstatus)) {
            return response()->json([
                'status' => 'success', 
                'message' => 'Information Matched!',
                'data'    => $userstatus
            ], 200);
        }else{
            return response()->json([
                'status' => 'error', 
                'message' => 'Details Not Added!'
            ], 400);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\notifications  $notifications
     * @return \Illuminate\Http\Response
     */
    public function show(notifications $notifications)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\notifications  $notifications
     * @return \Illuminate\Http\Response
     */
    public function edit(notifications $notifications)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\notifications  $notifications
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\notifications  $notifications
     * @return \Illuminate\Http\Response
     */
    public function destroy(notifications $notifications)
    {
        //
    }


    public function SendAll()
    {
        return view('admin.bulksms');
        //return view('home', compact('main'));    
    }


    public function Sendbulkmsg(notifications $notifications)
    {
        $allemails = notifications::get();
        $emaildata = array(
            'msgcontent' => $notifications->msg
        );  
        
        Mail::to('malkeet.seefat@gmail.com')->send(new bulksend($emaildata));
        
        return view('admin.bulksms');
        //return view('home', compact('main'));    
    }

}
