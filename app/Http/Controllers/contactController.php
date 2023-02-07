<?php
namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

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
        return view('frontend.winners');    
    }

    public function products(Request $request)
    {
        return view('frontend.products');    
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
