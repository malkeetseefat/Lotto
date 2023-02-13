<?php
namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\order;


class ContactController extends Controller
{

    public function index(Request $request)
    {
        return view('frontend.contact');    
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10|numeric',
            'subject' => 'required',
            'message' => 'required'
        ]);
        
        Contact::create($request->all());
        return redirect()->back()->with(['success' => 'Thank you for contact us. we will contact you shortly.']);
    }
    
    public function howtoplay(Request $request)
    {
        return view('frontend.howtoplay');    
    }

    public function winners(Request $request)
    {
        $status = order::where('status','1')->skip(0)->take(5)->get();
        $getproid = order::where('status','1')->first();
        if(!empty($getproid)){
            $getproid = $getproid->product_id;
        }
        $checkproduct = Product::where('id',$getproid)->get();
        return view('frontend.winners', compact('status','checkproduct'));    
    }

    public function products(Request $request)
    {
        $date = date('Y-m-d');
        $products = Product::where('end_date', '>=', $date)->get();
        return view('frontend.products', compact('products'));    
    }

    public function policy(Request $request)
    {
        return view('frontend.policy');    
    }

    public function terms(Request $request)
    {
        return view('frontend.terms');    
    }

    
}   
