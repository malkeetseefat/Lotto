<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\winning;
use App\Models\Product;
use App\Models\order;
use App\Models\bankdetails;
use Illuminate\Http\Request;


class WinningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function winning_user()
    {
        $count = order::where('status', '1')->get();

        foreach($count as $filter){
            $productid = $filter->product_id;
            $userid = $filter->user_id;
        }

        $bankdetail = bankdetails::where('user_id', $userid)->get();
        $product = Product::where('id', $productid)->get();
        return view("admin.winning-user", compact('count' , 'product', 'bankdetail'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = $request->all();
        $count = winning::where('user_id',$request->user_id)->count();
        if($count > 0){
            return back()->with('error', 'Your Order Details already submitted.');
        }else{
            winning::create($data);
            return back()->with('success', 'Your Order has been submitted.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $count = winning::where('user_id',$request->user_id)->count();

        if($count > 0){
            return back()->with('error', 'Your Order Details already submitted.');
        }else{
            winning::create($data);
            return back()->with('success', 'Your Order has been submitted.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\winning  $winning
     * @return \Illuminate\Http\Response
     */
    public function show(winning $winning)
    {
        $count = winning::where('user_id',Auth::id())->get();

        foreach($count as $filter){
            $userid = $filter->user_id;
            $productid = $filter->product_id;
            $amount = $filter->cash_amount;
            $productpoint = $filter->product_points;
            $submission_type = $filter->submission_type;
            $bankdetail_id = $filter->bankdetail_id;
        }
        $checkProduct = order::where('order_no', $productid)->get();

        foreach($checkProduct as $checkProduct){
            $product_id = $checkProduct->product_id;
        }

        $bankdetails = bankdetails::where('user_id', $bankdetail_id)->get();

        $checkProduct = Product::where('id', $product_id)->get();

        return view("admin.winning-status", compact('checkProduct','amount','submission_type','bankdetails'));
        
    }
    public function update_winner(Request $request)
    {
        $data = $request->all();        
        $id = $request->id;
        $status = $request->winning_order_status;

        $subject = $request->subject;
        $image = $request->photo;

        $imageName = time().'.'.$request->photo->extension();
        
        $request->photo->move(public_path('upload'), $imageName);

        $update_status = order::where("user_id", $id)->limit(1)->update(["winning_order_status" => $status , "subject" => $subject , "photo" => $imageName]);
        
        if ($update_status) {
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\winning  $winning
     * @return \Illuminate\Http\Response
     */
    public function update_winnerstatus(Request $request)
    {
        $data = $request->all();
        $id = $data['subjectId'];
        $userData = bankdetails::where('user_id', $data['subjectId'])->first();
        if (!empty($userData)) {
            return response()->json([
                'status' => 'success', 
                'message' => 'Information Matched!',
                'data'    => $userData
            ], 200);
        }else{
            return response()->json([
                'status' => 'error', 
                'message' => 'User Bank Details Not Added!',
                'dataid'    => $id
            ], 400);
        }
    }
}
