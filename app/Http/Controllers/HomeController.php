<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Review;
use App\Models\Slider;
use App\Models\AboutUs;
use App\Models\Product;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect(){
        $usertype=Auth::user()->usertype;
        if($usertype=='admin')
        {
            return view('admin.home');
        }
        else{
            $item=Slider::select('*')->get();
            $data=Product::all();
            $items=ContactUs::all();
            $category=Category::all();
            $subCategory=SubCategory::all();
            $user=auth()->user();
            $count=Cart::select('*')->where('phone',$user->phone)->count();
           
            return view('user.home',compact('data','count','items','item','category','subCategory'));
        }
    }

    //index || product
    public function index(){
        if(Auth::id()){
            return redirect('redirect');
        }
        else{
            $item=Slider::select('*')->get();
            $items=ContactUs::all();
            $data=Product::orderByRaw("RAND()")->get();
            $category=Category::all();
            $subCategory=SubCategory::all();
            $lastDeal=Product::latest()->limit(8)->get();
            return view('user.home',compact('data','items','item','lastDeal','category','subCategory'));
        }
    }

    //our products
    public function ourProducts(){
        if(Auth::user()){
        $item=Slider::select('*')->get();
        $items=ContactUs::all();
        $user=auth()->user();
        $cart=Cart::where('phone',$user->phone)->get();
        $count=Cart::where('phone',$user->phone)->count();
        $products=Product::orderByRaw("RAND()")->paginate(18);
        $category=Category::all();
        $subCategories=SubCategory::all();
       
        return view('user.OurProducts',compact('cart','count','products','items','item','category','subCategories'));
     }
     else{
        $items=ContactUs::all();
        $item=Slider::select('*')->get();
        $products=Product::orderByRaw("RAND()")->paginate(6);
        $category=Category::all();
         return view('user.OurProducts',compact('products','item','items','category'));
     }
     }

    //user detail product
    public function detailProduct($id){
       if(Auth::user()){
        $item=Slider::select('*')->get();
        $items=ContactUs::all();
        $user=auth()->user();
        $category=Category::all();
        $cart=Cart::where('phone',$user->phone)->get();
        $count=Cart::select('*')->where('phone',$user->phone)->count();
     $detail = Product::where('product_id',$id)->first();
    return view('user.detailProduct',compact('detail','count','cart','category','items','item'));
       }else{
        $item=Slider::select('*')->get();
        $items=ContactUs::all();
        $category=Category::all();
        $detail = Product::where('product_id',$id)->first();
        return view('user.detailProduct',compact('detail','category','items','item'));
       }
    }

    //search product
    public function searchProduct(Request $request){
        if(Auth::user()){
        $search=$request->search;
        $item=Slider::select('*')->get();
        $items=ContactUs::all();
        $user=auth()->user();
        $category=Category::all();
        $subCategory=SubCategory::all();
        $cart=Cart::where('phone',$user->phone)->get();
        $count=Cart::select('*')->where('phone',$user->phone)->count();
        $products=Product::orWhere('title','like','%'.$search.'%')
                      ->orWhere('subCategory','like','%'.$search.'%')
                      ->orWhere('price','like','%'.$search.'%')
                      ->orWhere('description','like','%'.$search.'%')
                      ->get();
        
    return view('user.OurProducts',compact('products','count','cart','items','item','category','subCategory'));
        }
        else{
        $search=$request->search;
        $item=Slider::select('*')->get();
        $items=ContactUs::all();
        $category=Category::all();
        $products=Product::orWhere('title','like','%'.$search.'%')
                      ->orWhere('subCategory','like','%'.$search.'%')
                      ->orWhere('price','like','%'.$search.'%')
                      ->orWhere('description','like','%'.$search.'%')
                      ->get();
    return view('user.OurProducts',compact('products','items','item','category'));
        }
    }

    
    //order create
    public function order(Request $request,$id){
        if(Auth::user())
        {  
            $user=Auth::user();
            $items=ContactUs::all();
            $products=Product::where('product_id',$id)->first();
            $cart=[
                'name'=>$user->name,
                'phone'=>$user->phone,
                'address'=>$user->address,
                'categoryTitle'=>$products->categoryTitle,
                'subCategory'=>$products->subCategory,
                'productCode'=>$products->productCode,
                'title'=>$products->title,
                'quantity'=>$request->quantity,
                'price'=>$products->price,
                'totalPrice'=>$products->price*$request->quantity,
                'product_id'=>$products->product_id,
            ];
           Cart::create($cart);
            return redirect()->back()->with(['success'=>'Product Added Successfuly']);
        }
        else{
            return redirect('login');
        }
    }
    //show cart
    public function showCart(){
        $items=ContactUs::all();
        $user=auth()->user();
        $cart=Cart::where('phone',$user->phone)->get();
        $products=Product::get();
        $count=Cart::where('phone',$user->phone)->count();
        
        return view('user.showCart',compact('cart','count','items','products')) ;
     }
    public function decQty($id){
        $data=Cart::where('id',$id)->first();
        if($data){
            $data->decrement('quantity');
        }
        return redirect()->route('user#showCart')->with(['success'=>'update successfully']);
        
    }
    public function incQty($id){
        $data=Cart::where('id',$id)->first();
        if($data){
            $data-> increment('quantity') ;
            
        }
        return redirect()->route('user#showCart')->with(['success'=>'update successfully']);
        
    }
     //delete order
     public function deleteOrder($id){
        Cart::where('id',$id)->delete();
        return back()->with(['success'=>'Delete Successfully']);
     }

     //order confirm
     public function confirmOrder(){
        $cart=Cart::all();
        if($cart->isEmpty()){
            return back()->with(['success'=>'there is no data to confirm']);
        }else{
        $user=Auth::user();
        $name=$user->name;
        $phone=$user->phone;
        $address=$user->address;
            foreach($cart as $carts){
            $order=new Order;
            $order->title=$carts->title;
            $order->quantity=$carts->quantity;
            $order->price=$carts->price;
            $order->name=$name;
            $order->phone=$phone;
            $order->address=$address;
            $order->subCategory=$carts->subCategory;
            $order->productCode=$carts->productCode;
            $order->status='not accept';
            $order->totalPrice=$carts->quantity*$carts->price;
            $order->product_id=$carts->product_id;
            $order->save();
        }
        Cart::where('phone',$phone)->delete();
        return redirect()->back()->with(['success'=>'Product Order Successfully']);
     }}
     
     //order confirm list
     public function orderConfirmList(){
        $items=ContactUs::all();
        $user=auth()->user();
        $data=Order::where('phone',$user->phone)->get();
        $count=Order::where('phone',$user->phone)->count();
       
        return view('user.orderConfirmList',compact('data','count','items')) ;
     }
     //admin confirm list
     public function adminConfirm(){
        $items=ContactUs::all();
        $user=auth()->user();
        
        $data=Order::where('phone',$user->phone)->get();
        $count=Order::where('phone',$user->phone)->count();
       
        return view('user.adminConfirmList',compact('data','count','items','user')) ;
     }
     
     //about us
     public function aboutUsUser(){

        if(Auth::user()){
            $item=Slider::select('*')->get();
            $about=AboutUs::all();
            $items=ContactUs::all();
            $user=auth()->user();
            $cart=Cart::where('phone',$user->phone)->get();
            $count=Cart::where('phone',$user->phone)->count();
            $products=Product::orderByRaw("RAND()")->paginate(20);
            $category=Category::all();
            $subCategory=SubCategory::all();
            return view('user.aboutUs',compact('cart','count','products','items','item','category','about','subCategory'));
         }
         else{
            $about=AboutUs::all();
            $items=ContactUs::all();
            $item=Slider::select('*')->get();
            $products=Product::orderByRaw("RAND()")->paginate(6);
            $category=Category::all();
            $subCategory=SubCategory::all();
             return view('user.aboutUs',compact('products','item','items','category','about','subCategory'));
         }
     }
    
 //slider
 public function slider(){
           
    $item=Slider::select('*')->get();
    return $item;
    // $user=auth()->user();
    // $count=Cart::where('phone',$user->phone)->count();
    return view('user.slider',compact('item'));
 
}
 //review 
 public function uploadReview(Request $request){
    $request->validate([
        'description'=>'required',
       ]);
   
    $review['description']=$request->description;
    Review::create($review);
    return back()->with(['success'=>'Thank For your feedback....']);
    // $review=Review::all();
    // return view('user.review',compact('review'));
   
}   


}




