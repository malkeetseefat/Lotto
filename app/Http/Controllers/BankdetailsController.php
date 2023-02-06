<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\bankdetails;
use Illuminate\Http\Request;
use DB;
use Auth;
class BankdetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
     
    public function index()
    {
        return view('admin.bankdetails.bank-details');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $query = new bankdetails;
        if (bankdetails::where('user_id', $request->user_id)->exists()) {

            $processes = bankdetails::where('id', $request->user_id)
                ->update($request->except(['_token']));
            
            return back()->with('success', 'Your Bank Details has been submitted.');
         }else{

            $input = ($request->all());

            //dd($input);
            // $data = $request->validate([
            //     'bankname' => 'required|min:2|max:150',
            //     'account_no' => 'required|min:2|max:50',
            //     'firstname' => 'required|min:2|max:12',
            //     'branchcode' => 'required',
            //     'accounttype' => 'required',
            //     'streetaddress' => 'required',
            //     'city' => 'required|max:10',
            //     'zipcode' => 'required|max:6',
            //     'country' => 'required|min:2|max:10',
            //     'panno' => 'required|min:2|max:10',
            //     'aadharno' => 'required|max:16',
            //     'contact' => 'required',
            //     'email' => 'required|unique:users|max:50'
            // ]);    

            bankdetails::create($input);
            return back()->with('success', 'Your form has been submitted.');

         }
    }
    
    public function create_first(Request $request)
    {
        return view('admin.bankdetails.bank-details');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function get_bankdetails(Request $request)
    {   
        $data = bankdetails::where('user_id',Auth::id())->get();
        //dd($data);
        return view('admin.bankdetails.bank-detail', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bankdetails  $bankdetails
     * @return \Illuminate\Http\Response
     */
    public function show(bankdetails $bankdetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bankdetails  $bankdetails
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $usersData = bankdetails::find($id);
        return view('admin.bankdetails.editbankdetails',compact('usersData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bankdetails  $bankdetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bankdetails $bankdetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bankdetails  $bankdetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(bankdetails $bankdetails)
    {
        //
    }
}
