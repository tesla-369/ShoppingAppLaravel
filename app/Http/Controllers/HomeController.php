<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Stripe;
use Session;

class HomeController extends Controller
{
    public function index(){
        // $product=product::paginate(3);
        $product=product::paginate(3);

        
        return view('home.index',compact('product'));
    }
    public function ProductDetail($id){
        $product=product::find($id);
        return view ('home.productdetail',compact('product'));
        
    }
    
    public function addToCartWithoutSession($id,Request $request){
        if(Auth::id()){
             $user=Auth::user();
             $product=Product::find($id);
             $user_id=$user->id;

             
            $product_exist_id=cart::where('product_id','=',$id)->where('user_id','=',$user_id)->get('id')->first();
             if($product_exist_id){
                $cart=cart::find($product_exist_id)->first();
                $quantity=$cart->quantity;
                $cart->quantity=$quantity+$request->quantity;
                if($product->discount_price!=null){
                    $cart->price=$product->discount_price*$cart->quantity;
    
                 }else{
                    $cart->price=$product->price*$cart->quantity;
    
                 }
                $cart->save();
                return redirect()->back();

                

             }else{
                $cart= new cart;
                $cart->user_id=$user->id;
                $cart->email=$user->email;
                $cart->name=$user->name;
                $cart->product_id=$product->id;
                $cart->product_title=$product->title;
                if($product->discount_price!=null){
                   $cart->price=$product->discount_price*$request->quantity;
   
                }else{
                   $cart->price=$product->price*$request->quantity;
   
                }
                
                $cart->quantity=$request->quantity;
                $cart->image=$product->image;
                $cart->save();
                return redirect()->back()->with('message','product Added Successfully');
   

             }
            
        }
        else{
            return redirect()->route('login');
        }
    }
    



    
    public function home(Request $request)
    {
        // Use Laravel's built-in attempt method for login
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            if (Auth::user()->usertype === '0') {
                $product=product::paginate(3);

        
                 return view('home.index',compact('product'));
                 
               
               
            } else {

                $user=User::where('usertype','0')->count();
                $order=Order::all()->count();
                $delivery_processing=Order::where('delivery_status','processing')->count();
               
                $totalprice=0;
                $revenue=Order::where('delivery_status','=','delievered')->get();
                foreach($revenue as $order_price){
                    $totalprice=$totalprice+$order_price->price;

                    
                }
                $total_products=Product::all()->count();

                

               
        
                return view('admin.home',compact('user','order','delivery_processing','totalprice','total_products'));
            }
            
        }
        
             $adminName = Auth::user()->name;
            
            return view('admin.indexcontain.navbar', ['adminName' => $adminName]);
            
        
    }

    // store using session
    public function addToCart($id,Request $request){
        $user = Auth::user();
        $product=Product::find($id);
        $cart = $request->session()->get('cart',[]);
        
        $cart[]= [
            //user information
            'id'=> $user->id,
            'name'=> $user->name,
            'phonenumber'=> $user->phonenumber,
            'address'=> $user->address,
            'email'=> $user->email,
            
            
            //product information
            'productid'=> $product->id,
            'title'=> $product->title,
            'price'=> $product->price,
            'discount'=> $product->discount,
            'quantity'=> $product->quantity,
            'category'=> $product->category,
            'image'=> $product->image,
            
        
        ];
        
        $request->session()->put('cart', $cart);
        return redirect()->back();

        

    }
    public function cartView(Request $request){
        $user = Auth::user();
        $cart = session()->get('cart',[]);
        if($user){
            $cart = session()->get('cart',[]);
            
            return view('home.cartView',compact('cart'));
        }
        else{
            return view('auth.login');
        }

    }

    public function deleteCart($id){
        $cart=cart::find($id);
        $cart->delete();
        return redirect()->back();
        
    }
    public function orderStore(){
        $user=Auth::user();
        $user_id=$user->id;

        $data=cart::where('user_id','=',$user_id)->get();
        foreach($data as $data){
            $order= new order;
            $order->user_id=$data->user_id;
            $order->user_name=$data->user_name;
            $order->email=$data->email;
            $order->phone=$data->phone;

            $order->product_id=$data->product_id;
            $order->product_name=$data->product_name;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->category=$data->category;
            $order->image=$data->image;

            $order->payment_status='unpaid';
            $order->delivery_status='processing';

            $order->save();
            $delete=$data->id;
            $update=cart::find($delete);
            $update->delete();

            
            

        }
        return redirect()->back()->with('message',"Order Store Successfully");
    }

    public function orderView(){
        if(Auth::id()){

        
        $user_id=Auth::user()->id;
        $order=order::where('user_id','=',$user_id)->get();

        return view('home.orderview',compact('order'));
        }

        else{
            return view('auth.login');

        }

    
    }

    public function cancelOrder($id){
        $order=order::find($id);
        $order->delete();
        return redirect()->back()->with('message',"order cancel sucessfully");

    }

    public function searchProduct(Request $request){
        // $product=product::paginate(3);
        // $product=product::all();
        $search=$request->search;
        $product=product::where('title','LIKE',"%$search%")->paginate(3);

        return view('home.index',compact('product'));
    }


    
    public function logout(){
        Auth::logout();
        return redirect(route('index'));
    }

    public function login(){
        
        return view('auth.login');
    }
    //payment using stripe
    public function stripe($total_price){
        return view('home.stripe',compact('total_price'));
}

public function stripePost(Request $request,$total_price)

{

   Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

 

   $customer = Stripe\Customer::create(array(

           "address" => [

                   "line1" => "Virani Chowk",

                   "postal_code" => "360001",

                   "city" => "Rajkot",

                   "state" => "GJ",

                   "country" => "IN",

               ],

           "email" => "demo@gmail.com",

           "name" => "Hardik Savani",

           "source" => $request->stripeToken

        ));

 

   Stripe\Charge::create ([

           "amount" => $total_price * 100,

           "currency" => "usd",

           "customer" => $customer->id,

           "description" => "payment successful",

           "shipping" => [

             "name" => "Jenny Rosen",

             "address" => [

               "line1" => "510 Townsend St",

               "postal_code" => "98140",

               "city" => "San Francisco",

               "state" => "CA",

               "country" => "US",

             ],

           ]

   ]); 
   //storing cart to order
   $user=Auth::user();
   $user_id=$user->id;
   $data=cart::where('user_id', '=',$user_id )->get();//user_id is of  cart and $user_id is of users table
   foreach($data as $data){
    $order=new order;
    //user information
    $order->user_id=$data->user_id;
    $order->user_name=$data->user_name;
    $order->email=$data->email;
    $order->phone=$data->phone;
    //product information
    $order->product_id=$data->product_id;
    $order->product_name=$data->product_name;
    $order->price=$data->price;
    $order->category=$data->category;
    $order->quantity=$data->quantity;
    $order->image=$data->image;
    $order->payment_status='paid';
    $order->delivery_status='processing';
    $order->save();
    $cart_id=$data->id;
    $cart=cart::find($cart_id);
    $cart->delete();

   }



   Session::flash('success', 'Payment successful!');

          

   return back();

   

}


}


