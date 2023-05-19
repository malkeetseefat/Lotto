<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Payment;
use App\Models\order;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Razorpay\Api\Api;
use Session;
use Exception;
use Redirect;
use App\Models\User;
use App\Models\bankdetails;
use App\Models\FirebaseSettings;
use App\Models\ipadrress;
use \Crypt;
use Illuminate\Support\Facades\Mail;
use App\Mail\winnerMail;
use Carbon\Carbon;
use App\Models\chargesSetting;
use App\Models\winning;


class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $date = date('Y-m-d');
        $products = Product::where('end_date', '>=', $date)->get();
        //$products = Product::where('end_date', '<=', Carbon::now());
        //dd($products);
        $id = Auth::id(); 
        $data1 = User::where('id', $id)->first()->actual_point;
        $data2 = User::where('id', $id)->first()->wallet_points;
        $count = $data1 + $data2;
        $status = order::where('status','1')->skip(0)->take(5)->get();
        $getproid = order::where('status','1')->first();
        if(!empty($getproid)){
            $getproid = $getproid->product_id;
        }
        $checkproduct = Product::where('id',$getproid)->get();
        return view('products', compact('products' ,'count','status','checkproduct'));
    }

    public function viewpro()
    {
        // $allProduct = Product::where('user_id',Auth::id())->get();
        // return view('allproducts', compact('allProduct'));
        $data = Auth::id();


        $checkauth = User::where('id', $data)->first();    
        $admin = $checkauth->role;

        if($admin == '1'){
            $allProduct = Product::paginate(10);
            return view('admin.allproducts',compact('allProduct'));
        }else{
            return Redirect::back()->withErrors(['msg' => 'This Portal Use Only Admin!']);
        }
    }

    public function delete(Request $request)
    {
        $data = Product::findOrFail($request->id);
        $data->delete();
        return redirect()->back();
    }

    public function deleteorder(Request $request)
    {

        $data = Order::findOrFail($request->id);
        $data->delete();
        return redirect()->back();

    }

    public function cart()
    {  

        $id = Auth::id(); 
        $data1 = User::where('id', $id)->first()->actual_point;
        $data2 = User::where('id', $id)->first()->wallet_points;
        $count = $data1 + $data2;
        return view('cart', compact('count'));

    }

    public function addpro()
    {
        return view('admin.addproducts');
    }

    public function edit(Request $request)
    {
        $usersData = Product::find($request->id);
        return view('admin.editProduct',compact('usersData'));
    }

    public function edit_post(Request $request)
    {
        $query = Product::where('id',$request->userid)->first();
        $file = $request->photo;
        if(!empty($request->name)){
            $query->name = $request->name;
        }
        if(!empty($request->start_date)){
            $query->start_date = $request->start_date;

        }if(!empty($request->end_date)){
            $query->end_date = $request->end_date;

        }if(!empty($request->description)){
            $query->description = $request->description;

        }if(!empty($request->price)){
            $query->price = $request->price;

        }if(!empty($request->category)){
            $query->category = $request->category;

        }if(!empty($request->photo)){
            $query->photo = $file->getClientOriginalName();
        }
        if($request->file('photo')){
            $file= $request->file('photo');
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('upload'), $filename);
            $data['photo']= $filename;
        }
        $query->save();
        return redirect('products');
    }

    public function addproduct(Request $request)
    {
        $query = new Product;
        $query->user_id = Auth::id();
        $query->name = $request->name;
        $query->start_date = $request->start_date;
        $query->end_date = $request->end_date;
        $query->seller = $request->seller;
        $query->ticket_no = '#'.rand(1000, 9999).str_pad($request->id, 3, STR_PAD_LEFT);
        $query->description = $request->description;
        $query->price = $request->price;
        $query->category = $request->category;
        $file = $request->photo;
        
        $query->photo = $file->getClientOriginalName();

        if($request->file('photo')){
            $file= $request->file('photo');
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('upload'), $filename);
            $data['photo']= $filename;
        }
        $query->save();
        return redirect('products');
    }

    public function addToCart($id)
    {

        $product = Product::find($id);

        $checkid = $product->id;
        
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');

        if(!$cart) {
            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "photo" => $product->photo,
                        "id" => $checkid
                    ]
            ];
            session()->put('cart', $cart);
            return redirect('cart')->with('success', 'Product added to cart successfully!');
        }
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect('cart')->with('success', 'Product added to cart successfully!');
        }
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->photo,
            "id" => $checkid
        ];
        session()->put('cart', $cart);
        return redirect('cart')->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully!');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) 
        {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully!');
        }
    }

    public function r_payment()
    {  
        $data = Auth::id();
        $user = User::where('id', $data)->first()->email;
        return view('razorpayView',compact('user'));
    }
    
    public function payment(Request $request)
    {
        $input = $request->all();      
        $api = new Api("rzp_test_knzbBWvBK63oOv", "hkSqop01RcAdsy51lwz7I0dd");
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        $amount = $payment->amount;
        $netAmount = substr($amount, 0, -2);
        $query = new Payment;
        $query->user_id = Auth::id();
        $query->payment_id = $payment->id;
        $query->amount = $netAmount;
        $query->status = $payment->status;
        $query->save(); 
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
                $data = $input['amount'];
                $suponser_id = Auth::id();
                $checkswallet = User::where('id', $suponser_id)->first()->actual_point;
                $actual_point = $checkswallet + $data * 4;
                $wallet_Update1 = User::where("id", $suponser_id)->limit(1)->update(["actual_point" => $actual_point]);
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
        Session::put('success', 'Payment successful');
        // if(session()->has('success'))
        // {
        //     $api = new Api("rzp_test_knzbBWvBK63oOv", "hkSqop01RcAdsy51lwz7I0dd");
        //     $data = $api->payment->all();
        //     dd($data);
        // }
        return redirect()->back();
    }

    public function user_profile()
    {

        $data = Auth::id();
        $user = User::where('id', $data)->first()->suponser_id;
        $finalid = Crypt::encrypt($user);
        return view('profile',compact('finalid'));

    }
    
    Public function buy_now($title)
    {
        $check = $title;
        $cart = session()->get('cart');
        return view('frontend.buy-product',compact('check','cart'));
    }

    Public function create_order(Request $request)
    {
        if(Auth::check()){
        $cart = session()->get('cart');
        foreach ($cart as $index) {
            $query = new order;
            $check = $index['price'];
            
            $query->user_id = Auth::id();
            $query->first_name = $request->first_name;
            $query->last_name = $request->last_name;
            $query->thing_you_want_to_order = $request->thing_you_want_to_order;
            $query->DOB = $request->DOB;
            $query->street_address = $request->street_address;
            $query->city = $request->city;
            $query->region = $request->region;
            $query->pin_code = $request->pin_code;
            $query->country = $request->country;
            $query->payment_id = $request->payment_id;
            $query->amount = $index['price'];
            $query->product_id = $index['id'];
            $query->contact = $request->contact;
            $query->status = '0';
            $latestOrder = DB::table('orders')->orderBy('id', 'desc')->first();

            if(empty($latestOrder)){
                $latestOrder = '1000';
            }else{
                $latestOrder = $latestOrder->id;
            }
            $query->order_no = '#'.str_pad($latestOrder + 1, 8, "0", STR_PAD_LEFT);
            $data = Auth::id();
            $user = User::where('id', $data)->first()->suponser_id;
            $finalid = Crypt::encrypt($user);       

            $wallet_points = User::where('id',  Auth::id())->first()->wallet_points; 
            $pointdeduct = $wallet_points - $check;

            $actual_point = User::where('id',  Auth::id())->first()->actual_point;
            $pointdeduct1 = $actual_point - $check;
            
            if($wallet_points >= $check ){
                $wallet_points1 = User::where("id", Auth::id())->limit(1)->update(["wallet_points" => $pointdeduct]);
                $query->save();
                Session::forget('cart');    
                return redirect('order-details');        
            }
            if($actual_point >= $check ){
                    $actual_point1 = User::where("id", Auth::id())->limit(1)->update(["actual_point" => $pointdeduct1]);
                    $query->save();
                    return redirect('order-details');
            }if($wallet_points < $check){
                //\Session::flash('success', 'Please add more points in your wallet.');
                return redirect()->back()->with('error','Please add more points in your wallet.');
            }
            
            }
        }else{
            return redirect('login');
        }
    }

    Public function order_details()
    {
        $data = DB::table('orders')->orderBy('id', 'desc')->first();
        $useremail = Auth::User()->email;
        return view('order-details', compact('data'));
    }

    Public function error_solve()
    {
        return view('frontend.buy-product');
    }
    
    Public function category($data)
    {
        $result = DB::Table('products')->where('category',$data)->select('id','name','photo','price')->get();  
        return view('frontend.product-category', compact('result'));
    }

    public function search()
    {
            $project = Product::query();
            if (request('term')) {
                $project->where('name', 'Like', '%' . request('term') . '%');
            }
            $allProduct =  $project->orderBy('id', 'DESC')->paginate(2);
            return view('admin.searchdata',compact('allProduct'));
    }

    public function vieworder()
    {
        $check = User::where('id', Auth::id())->first()->role;
        if($check == 1){

            $allOrder = order::paginate(5);
            return view('admin.allorders',compact('allOrder', 'check'));

        }else{

            $allOrder = order::where('user_id',Auth::id())->paginate(5);

            $winner = order::where('user_id',Auth::id())->get();
             
            $winnerid = order::select('*')->where('user_id', Auth::id())->first();

            //dd($winnerid);

            $chargesdeduction  = chargesSetting::select('*')->first();

            $point_deduction = $chargesdeduction['point_deduction'];

            $point_to_cash = $chargesdeduction['point_to_cash'];

            $checkbank = bankdetails::where('user_id',Auth::id())->first();

            $contact = User::where('id',Auth::id())->first()->contact;
            
            $winningplaced = winning::where('user_id',Auth::id())->count();

            $firebasesetting  = FirebaseSettings::select('*')->where('status', '1')->get();
                        
            if(!empty($winnerid)){
               $winnerstatus = $winnerid->status;
               $product_id = $winnerid->product_id;
               $ticket_no = Product::where('id' , $product_id)->first();
               $lottery_no = $ticket_no->ticket_no;
               $product_name = $ticket_no->name;
               return view('admin.allorders',compact('allOrder', 'firebasesetting', 'contact', 'winningplaced', 'point_deduction', 'point_to_cash', 'checkbank', 'check', 'winner', 'winnerstatus', 'lottery_no', 'product_name'));
            }else{
                $winnerstatus = '0';
                return view('admin.allorders',compact('allOrder', 'check', 'winner', 'winningplaced','winnerstatus'));
            }            
        }
    }

    public function filter_product(Request $request)
    {
        $check = $request->all();
        $check = $check['filter'];
        $filter = Product::where('category', $check)->get();
        $filtercount = Product::where('category', $check)->count();
        return view("frontend.filter-product", compact('filter','filtercount'));
    }

    public function search_order()
    {
            $project = Order::query();
            if (request('term')) {
                $project->where('order_no', 'Like', '%' . request('term') . '%');
            }
            $orderfilter =  $project->orderBy('id', 'DESC')->paginate(5);
            return view('admin.searchorder',compact('orderfilter'));
    }

    public function product_check($id)
    {  
        $product_id= $id;
        $user = Product::where('id', $product_id)->first();
        $check = $user['category'];
        $data = Product::where('category', $check)->get();
        $allProduct = Product::all();
        return view ('frontend.single-product', compact('user', 'data', 'allProduct'));
    }

    public function all_users()
    {  
        $data = Auth::id();
        $checkauth = User::where('id', $data)->first();
        $admin = $checkauth->role;
        if($admin == '1'){
        $allProduct = User::paginate(5);
        return view ('admin.users', compact('allProduct'));
        }
        else{
            return Redirect::back()->withErrors(['msg' => 'This Portal Use Only Admin!']);
        }
    }

    public function team()
    {
        $data = Auth::id();
        $check = User::where('id', $data)->first();
        $check = $check->suponser_id;
        $checkparentid = User::where('parent_id', $check)->paginate(5);
        $users = User::all();
        $user_fields =  DB::table('users')->select('parent_id')->get();
        return view('admin.team-members', compact('checkparentid'));
    }

    public function changeStatus(Request $request)
    {
        $user = order::find($request->user_id);
        $getemail = $user->user_id;
        $getemail1 = User::where('id', $getemail)->first();
        $getemail = $getemail1->email;
        $name = $getemail1->name;
        
        //ticket no
        $ticket_no = $user->product_id;
        $ticket_no1 = Product::where('id', $ticket_no)->first();
        $ticket_no = $ticket_no1->ticket_no;
        $emaildata = array(
            'ticket_no'    => $ticket_no,
            'name'         => $name,
            'product_name' => $ticket_no1->name
        );         
        $user->status = $request->status;
        $user->save();
        
        $status = $request->status;
        if($status == 1){
            Mail::to($getemail)->send(new winnerMail($emaildata));
        }
        return response()->json(['success'=>'Status change successfully.']);
    }
    
}

