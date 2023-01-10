<?php

namespace App\Http\Controllers;

use Stripe;
use Exception;
use App\Models\Rating;
use App\Models\Vendor;
use App\Models\Billing;
use App\Models\Contact;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Category;
use App\Models\HomeSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;

class MainController extends Controller
{
    public $get;
    public function index()
    {
        $getData = Product::get();
        $vendor = Vendor::get();
        $slider = HomeSlider::get();
        $getProductByCategory = Category::with('product')->get();
        return view('welcome', compact('getData','slider','getProductByCategory','vendor'));
    }

    public function shop(Request $request){
        if($request->price == 'price-1'){
            $max = 100;
            $getData = Product::where('price', '<=', $max)->paginate(9);
            
        }elseif($request->price == 'price-2'){
            $min = 100;
            $max = 200;
            $getData = Product::where('price', '<=', $max)->where('price', '>=', $min)->paginate(9);
        }
        elseif($request->price == 'price-3'){
            $min = 200;
            $max = 300;
            $getData = Product::where('price', '<=', $max)->where('price', '>=', $min)->paginate(9);
        }elseif($request->price == 'price-4'){
            $min = 300;
            $max = 400;
            $getData = Product::where('price', '<=', $max)->where('price', '>=', $min)->paginate(9);
        }elseif($request->price == 'price-5'){
            $min = 400;
            $max = 500;
            $getData = Product::where('price', '<=', $max)->where('price', '>=', $min)->paginate(9);
        }
        
        elseif($request->sorting == 'latest'){
            $getData = Product::latest()->paginate(9);
        }elseif($request->sorting == 'all'){
            $getData = Product::paginate(9);
        }else{
            $getData = Product::paginate(9);
        }
        return view('shop', compact('getData'));
    }
    
    public function single(Request $request, $id){
        $getRating = Rating::with('product')->with('user')->where('product_id', $id)->where('user_id', Auth::id())->get();
        $getProduct = Product::where('id', $id)->get();
        $getProduct1 = Product::with('category')->where('id', $id)->pluck('category_id');
        $getProductByCategory = Product::where('category_id', $getProduct1)->get();
        return view('single-product',compact('getProduct','getProductByCategory','getRating'));
    }

    public function cart(){
        return view('cart');
    }

    public function addToCart(Request $request, $id){
        if(Auth::user())
        {
        $data = Product::findOrFail($id);
        //dd($data);
        $cart = session()->get('cart', []);
        if(isset($cart[$id]))
        {
            $cart[$id]['qty']++;
        }else{
            if($request->qty)
            {
            $cart[$id] = [
                "id" => $id,
                "name" => $data->product_name,
                'qty' => $request->qty,
                "price" => $data->price,
                "image" => $data->image,
                // "size" => $request->size,
                // "color" => $request->color,
            ];
            }else{
                $cart[$id] = [
                    "id" => $id,
                    "name" => $data->product_name,
                    "qty" => 1,
                    "price" => $data->price,
                    "image" => $data->image,
                ];
            }
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
        }else{
        return redirect()->back()->with('error', 'Please Login!');
        }
        
    }

    public function update(Request $request){
        $cart = session()->get('cart');
        $cart[$request->id]['qty'] = $request->qty;
        session()->put('cart', $cart);
        session()->flash('success', 'Cart updated successfully');
    }

    public function destroy(Request $request){
        if($request->id){
        $cart = session()->get('cart');
        if(isset($cart[$request->id])){
            unset($cart[$request->id]);
            session()->put('cart', $cart);
        }
        return response()->json([
            'status'=>200,
            'message'=>'Item Deleted',
        ]);
        }
        return response()->json([
            'status'=>404,
            'message'=>'Error!',
        ]);
    }

    public function category(){
        $getCategory = Category::get();
        return view('category', compact('getCategory'));
    }

    public function categoryById(Request $request, $id){
        $getCategoryById = Category::with('product')->where('id', $id)->get();
        return view('category', compact('getCategoryById'));
    }

    // public function fetch(Request $request)
    // {
    //     $getCategory = Category::with('product')->where('id', $request->id)->get();
    //     return response()->json(['categoryData'=>$getCategory],200);
    // }

    public function checkout()
    {
        return view('checkout');
    }

    public function postSave(Request $request){
        //dd($request);
        // if($request->shipto)
        // {
        //     $request->validate([
        //         'shipping_country' => ['required'],
        //         'shipping_first_name' => ['required'],
        //         'shipping_last_name' => ['required'],
        //         'shipping_company' => ['required'],
        //         'shipping_address_1' => ['required'],
        //         'shipping_address_2' => ['nullable'],
        //         'shipping_city' => ['required'],
        //         'shipping_state' => ['required'],
        //         'shipping_postcode' => ['required'],
        //         'shipping_email' => ['required'],
        //         'shipping_phone' => ['required'],
        //     ],
        //     [
        //         'shipping_first_name.required' => 'Firstname is required.',
        //         'shipping_last_name.required' => 'Lastname is required.',
        //         'shipping_company.required' => 'Companyname is required.',
        //         'shipping_address_1.required' => 'Address is required.',
        //         'shipping_city.required' => 'City is required.',
        //         'shipping_state.required' => 'State is required.',
        //         'shipping_postcode.required' => 'Postcode is required.',
        //         'shipping_email.required' => 'Email is required.',
        //         'shipping_phone.required' => 'Phone is required.',
        //     ]
        //     );
        // }else{
        $request->validate([
            'billing_country' => ['required'],
            'billing_first_name' => ['required'],
            'billing_last_name' => ['required'],
            'billing_address_1' => ['required'],
            'billing_address_2' => ['nullable'],
            'billing_city' => ['required'],
            'billing_state' => ['required'],
            'billing_postcode' => ['required'],
            'billing_email' => ['required'],
            'billing_phone' => ['required'],
            'shipping_country' => ['nullable'],
            'shipping_first_name' => ['nullable'],
            'shipping_last_name' => ['nullable'],
            'shipping_company' => ['nullable'],
            'shipping_address_1' => ['nullable'],
            'shipping_address_2' => ['nullable'],
            'shipping_city' => ['nullable'],
            'shipping_state' => ['nullable'],
            'shipping_postcode' => ['nullable'],
            'shipping_email' => ['nullable'],
            'shipping_phone' => ['nullable'],
            'number' =>  ['required'],
            'exp_month' =>  ['required'],
            'exp_year' =>  ['required'],
            'cvc' =>  ['required']
        ],
        [
            'billing_first_name.required' => 'Firstname is required.',
            'billing_last_name.required' => 'Lastname is required.',
            'billing_company.required' => 'Companyname is required.',
            'billing_address_1.required' => 'Address is required.',
            'billing_city.required' => 'City is required.',
            'billing_state.required' => 'State is required.',
            'billing_postcode.required' => 'Postcode is required.',
            'billing_email.required' => 'Email is required.',
            'billing_phone.required' => 'Phone is required.',
            'number' => 'Card number is required.',
            'exp_month' => 'Card month is required.',
            'exp_year' => 'Card year is required.',
            'cvc' => 'Card CVC is required.'
        ]
        );
            $stripe = Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            try{
            $token = \Stripe\Token::create([
                'card' => [
                    'number' => $request->number,
                    'exp_month' => $request->exp_month,
                    'exp_year' => $request->exp_year,
                    'cvc' => $request->cvc,
                    ],

            ]);
            $charge = \Stripe\Charge::create([
                'card' => $token['id'],
                'currency' => 'INR',
                'amount' =>  100 * 100,
                'description' => 'wallet',
            ]);
            if($charge['status'] == 'succeeded') {
                $data = new Billing();
                $data->firstname = $request->billing_first_name;
                $data->lastname = $request->billing_last_name;
                //$data->companyname = $request->billing_company;
                $data->address1 = $request->billing_address_1;
                $data->address2 = $request->billing_address_2;
                $data->city = $request->billing_city;
                $data->state = $request->billing_state;
                $data->postcode = $request->billing_postcode;
                $data->email = $request->billing_email;
                $data->phone = $request->billing_phone;
                //$data->password = $request->account_password;
                $data->save();

                foreach(session()->get('cart') as $key => $row){
                    $newData = new Payment();
                    $newData->order_id = rand();
                    $newData->billing_id = $data->id;
                    $newData->user_id = Auth::id();
                    $newData->productname = $row['name'];
                    $newData->qty = $row['qty'];
                    $newData->price = $row['price'];
                    $newData->image = $row['image'];
                    $newData->transaction_id = $charge->id;
                    $newData->last4 = $charge->payment_method_details->card->last4;
                    $newData->paymentstatus = $charge['status'];
                    $newData->save();
                    $request->session()->forget($key);
                }
                return redirect()->route('shop')->with('success', 'Payment Success!');
                
            } else {
                return redirect()->route('shop')->with('error', 'something went to wrong.');
            }


            }catch(\Exception $e){
                dd($e->getMessage());
            }
        // }else{
        //     return redirect()->back()->with('error', 'Please login before checkout.');
        // }
    //}
    }
    public function contact(){
        return view('contact');
    }

    public function contactSave(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'subject' => ['required'],
            'message' => ['required']
        ]);

        $data = new Contact();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->subject = $request->subject;
        $data->message = $request->message;
        $data->save();

        return redirect()->back()->with('success', 'Saved');
    }

    public function ratingSave(Request $request)
    {
        if(Auth::user())
        {
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'content' => ['required'],
            'rating' => ['required'],
        ]);
        $ratingData = new Rating();
        $ratingData->user_id = Auth::id();
        $ratingData->product_id = $request->id;
        $ratingData->name = $request->name;
        $ratingData->email = $request->email;
        $ratingData->content = $request->content;
        $ratingData->rating = $request->rating;
        $ratingData->save();
            return redirect()->back()->with('success', 'Successful');
        }else{
            return redirect()->back()->with('error', 'Please Login...');
        }
    }

}
