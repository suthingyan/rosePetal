<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\Color;
use App\Models\Order;
use App\Models\Review;
use App\Models\Slider;
use App\Models\AboutUs;
use App\Models\Product;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\orderReject;
use App\Models\SubCategory;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function product(){
        if(Auth::id()){
            if(Auth::user()->usertype=='admin'){
                $categories = Category::get();
                $subCategory=SubCategory::get();
                $productColor=Color::get();
                $productSize=Size::get();
                $pdtcolor=ProductColor::get();
                return view('admin.product')->with(['category'=>$categories,'subCategories'=>$subCategory,'color'=>$productColor,'size'=>$productSize]);
            }
            else{
                return back();
            }

    }
    else{
        return redirect('login');
    }
    }

    // public function createProduct(){

    //     return view('admin.product');
    // }
    //upload product
    public function uploadProduct(Request $request){


//     $request->validate([
//      'categoryTitle' => 'required',
//      'subCategory' => 'required',
//      'productCode' => 'required |unique :products,productCode',
//      'productTitle'=>'required',
//      'price'=>'required',
//      'description'=>'required',
//      'color'=>'required',
//      'size'=>'required',
//      'quantity'=>'required',
//      'image'=>'required',
//     ]);
     $pdtcolor=ProductColor::get();
     $categories = Category::get();
     $subCategory=SubCategory::get();
     $color=Color::get();
     $size=Size::get();
     $data=[];
     $data['category_id']=$request->categoryTitle;
     $data['subCategory']=$request->subCategory;
     $data['productCode']=$request->productCode;
     $data['title']=$request->productTitle;
     $data['price']=$request->price;
     $data['description']=$request->description;
     $data['color']=$request->color;
     $data['size']=$request->size;
     $data['quantity']=$request->quantity;
     $data['sub_id']=$subCategory[0]->sub_id;
     $data['color_id']=$color[0]->color_id;
     $data['size_id']=$size[0]->size_id;
        $file=$request->image;
        $fileName=time().$file->getClientOriginalExtension();
        $file->move(public_path().'/product/images/',$fileName);
        $data['image']=$fileName;
//        dd($data);

        $product=Product::create($data);
        if($request->color){
            foreach($request->color as $key => $item){
                $color_data=[];
                $color_data['product_id']=$product->id;
                    $color_data['color_id']=$item;
                    $color_data['quantity']=$request->colorquantity[$key] ?? 0;
                    ProductColor::create($color_data);
            }
        }
        return redirect()->route('admin#productList')->with(['product'=>$data,'success'=>'procuct create successfully']);

    }

    //product list
    public function productList(){
        $data=Product::all();

        return view('admin.productList')->with(['product'=>$data]);
    }

    public function searchProductList(Request $request){

        if(Auth::id()){
            if(Auth::user()->usertype=='admin'){
                $searchList=$request->searchList;
                //$item=Slider::select('*')->get();
                //$items=ContactUs::all();
                //$user=auth()->user();
                $category=Category::all();
                //$cart=Cart::where('phone',$user->phone)->get();
                //$count=Cart::select('*')->where('phone',$user->phone)->count();
                $product=Product::orWhere('title','like','%'.$searchList.'%')
                              ->orWhere('subCategory','like','%'.$searchList.'%')
                              ->orWhere('price','like','%'.$searchList.'%')
                              ->orWhere('description','like','%'.$searchList.'%')
                              ->get();
                              return view('admin.productList',compact('product','category'));
            }
            else{
                return back();
            }

    }
         }

    //pending product
    public function pending($id){
        $data=Product::where('product_id',$id)->first();
        $data=['status'=>0,];
        Product::where('product_id',$id)->update($data);
        return back();
    }

    //featured product
    public function featured($id){
        $data=Product::where('product_id',$id)->first();
        $data=['status'=>1,];
        Product::where('product_id',$id)->update($data);
        return back();
    }
     //popular product
     public function popular($id){
        $data=Product::where('product_id',$id)->first();
        $data=['status'=>2,];
        Product::where('product_id',$id)->update($data);
        return back();
    }
    //product edit
    public function productEdit($id){
        $categories = Category::get();
        $subCategory=SubCategory::get();
        $color=Color::get();
        $size=Size::get();
         $data=Product::where('product_id',$id)->first();
        return view('admin.productEdit')->with(['editData'=>$data,'category'=>$categories,'subCategories'=>$subCategory,'color'=>$productColor,'size'=>$productSize]);
    }

    //update product
    public function productUpdate($id,Request $request){
        $request->validate([
            'productTitle'=>'required',
            'price'=>'required',
            'description'=>'required',
            'color'=>'required',
            'size'=>'required',
            'quantity'=>'required',
            'image'=>'required',
            //'categoryTitle' => 'required',
            'subCategory' => 'required',
           ]);
        $updateData=[
            //'categoryTitle'=>$request->categoryTitle,
            'subCategory'=>$request->subCategory,
            'title'=>$request->productTitle,
            'price'=>$request->price,
            'description'=>$request->description,
            'color'=>$request->color,
            'size'=>$request->size,
            'quantity'=>$request->quantity,

        ];
        if(isset($request->image)){
            $oldImg=Product::select('image')->where('product_id',$id)->first();
            $oldImgName=$oldImg['image'];
            if(File::exists(public_path().'/product/images/'.$oldImgName))   {
                File::delete(public_path().'/product/images/'.$oldImgName);
            }
        }
        $newImg=$request->image;
        $newFileName=time().$newImg->getClientOriginalName();
        $newImg->move(public_path().'/product/images/',$newFileName);
        $updateData['image']=$newFileName;
        Product::where('product_id',$id)->update($updateData);
        return redirect()->route('admin#productList')->with(['data'=>$updateData,'success'=>'update successfully']);

    }

    //product delete
    public function productDelete($id){
        $data=Product::select('image')->where('product_id',$id)->first();
        $fileName=$data['image'];
        Product::where('product_id',$id)->delete();
        if(File::exists(public_path().'/product/images/'.$fileName)){
            File::delete(public_path().'/product/images/'.$fileName);
        }
        return back()->with(['success'=>'product delete successfully']);
    }

    //color index
    public function color(){
        return view('admin.color');
    }

    //upload color
    public function uploadColor(Request $request){
        $request->validate([
            'color'=>'required',
           ]);
        $color=[
            'color'=>$request->color,

        ];

        Color::create($color);
        return redirect()->route('admin#colorList',compact('color'));
    }

    //store color
    public function colorList(){
        $data=Color::all();
        return view('admin.colorList',compact('data'));
    }

    //color edit
    public function colorEdit($id){

        $data=Color::where('color_id',$id)->first();
        return view('admin.colorEdit')->with(['editData'=>$data]);
    }


    //color update
    public function updateColor($id,Request $request){
        $request->validate([
            'color'=>'required',
           ]);
        $updateData=[

            'color'=>$request->color,
        ];

        Color::where('color_id',$id)->update($updateData);
        return redirect()->route('admin#colorList')->with(['data'=>$updateData,'success'=>'update successfully']);
    }

    //color delete
    public function deleteColor($id){
        Color::select('*')->where('color_id',$id)->delete();
        return back()->with(['success'=>'delete data successfully']);
    }

    //size index
    public function size(){
        return view('admin.size');
    }

    //upload size
    public function uploadSize(Request $request){
        $request->validate([
            'size'=>'required',
           ]);
        $size=[
            'size'=>$request->size,

        ];

        Size::create($size);
        return redirect()->route('admin#sizeList',compact('size'));
    }

    //store size
    public function sizeList(){
        $data=Size::all();
        return view('admin.sizeList',compact('data'));
    }

    //size edit
    public function sizeEdit($id){

        $data=Size::where('size_id',$id)->first();
        return view('admin.sizeEdit')->with(['editData'=>$data]);
    }


    //size update
    public function updateSize($id,Request $request){
        $request->validate([
            'size'=>'required',
           ]);
        $updateData=[

            'size'=>$request->size,
        ];

        Size::where('size_id',$id)->update($updateData);
        return redirect()->route('admin#sizeList')->with(['data'=>$updateData,'success'=>'update successfully']);
    }

    //size delete
    public function deleteSize($id){
        Size::select('*')->where('size_id',$id)->delete();
        return back()->with(['success'=>'delete data successfully']);
    }


     //slider us index
     public function slider(){
        return view('admin.slider');
    }

    //slider contact us
    public function uploadSlider(Request $request){
        $request->validate([
            'image'=>'required',
           ]);
        $slider=[];
        $file=$request->image;
        $fileName=time().$file->getClientOriginalName();
        $file->move(public_path().'/product/images/',$fileName);
        $slider['image']=$fileName;
        Slider::create($slider);
        return redirect()->route('admin#storeSlider');
    }

    //store slider us data
    public function storeSlider(){
        $data=Slider::all();
        // dd($data);
        return view('admin.storeSlider',compact('data'));
    }

    //slider us edit
    public function sliderEdit($id){

        $data=Slider::where('id',$id)->first();
        return view('admin.sliderEdit')->with(['editData'=>$data]);
    }


    //contact us update
    public function sliderUpdate($id,Request $request){
        $request->validate([
            'image'=>'required',
           ]);

        if(isset($request->image)){
            $oldImg=Slider::select('image')->where('id',$id)->first();
            $oldImgName=$oldImg['image'];
            if(File::exists(public_path().'/product/images/'.$oldImgName))   {
                File::delete(public_path().'/product/images/'.$oldImgName);
            }
        }
        $new=$request->image;
        $newFileName=time().$new->Extension();
        $new->move(public_path().'/product/images/',$newFileName);
        $updateData['image']=$newFileName;

        Slider::where('id',$id)->update($updateData);
        return redirect()->route('admin#storeSlider')->with(['data'=>$updateData,'success'=>'update successfully']);
    }

    //contact us delete
    public function sliderDelete($id){
        $data=Slider::select('image')->where('id',$id)->first();
        $fileName=$data['image'];
        Slider::select('*')->where('id',$id)->delete();
        if(File::exists(public_path().'/product/images/'.$fileName)){
            File::delete(public_path().'/product/images/'.$fileName);
        }

        return back()->with(['success'=>'delete data successfully']);
    }


    //order show
    public function showOrder(){
        $subCategory=SubCategory::all();
        $order=Order::all();

        return view('admin.showOrder',compact('order','subCategory'));
    }
    //reject order
    public function reject($id){

        $rejectOrder=Order::select('*')->where('id',$id)->get();
        $orderReject=[];
        $orderReject['*']=$rejectOrder;
        $rejectData=orderReject::create($orderReject);

        Order::select('*')->where('id',$id)->delete();
        return view('user.adminConfirmList');
    }
    //order update status
    public function updateStatus($id,Request $request){
        $data = Product::select('products.*','orders.*')
        ->join('orders','orders.product_id','products.product_id')
        ->where('id',$id)
        ->get();

        $order=Order::find($id);
        $order->status='accepted';
        $order->save();
$products=Product::all();

 $product = Product::where('product_id', $order->product_id)->get()[0]->quantity;
 $orders=Order::where('id', $id)->get()[0]->quantity;
    $qty=$product-$orders;
   $product=$qty;
    //dd($product);
    $products->quantity=$product;
    $products=['quantity'=>$product];
   Product::where('product_id',$order->product_id)->update($products);
        return redirect()->back();
    }

    //about us index
    public function aboutUs(){
        return view('admin.aboutUs');
    }

    //upload about us
    public function uploadAboutUs(Request $request){
        $request->validate([
            'description'=>'required',
           ]);
        $aboutUs=[
            'description'=>$request->description,

        ];

        AboutUs::create($aboutUs);
        return redirect()->route('admin#storeAboutUs',compact('aboutUs'));
    }

    //store about us data
    public function storeAboutUs(){
        $data=AboutUs::all();
        // dd($data);
        return view('admin.storeAboutUs',compact('data'));
    }

    //about us edit
    public function aboutUsEdit($id){

        $data=AboutUs::where('id',$id)->first();
        return view('admin.aboutUsEdit')->with(['editData'=>$data]);
    }


    //about us update
    public function aboutUsUpdate($id,Request $request){
        $request->validate([
            'description'=>'required',
           ]);
        $updateData=[

            'description'=>$request->description,
        ];

        AboutUs::where('id',$id)->update($updateData);
        return redirect()->route('admin#storeAboutUs')->with(['data'=>$updateData,'success'=>'update successfully']);
    }

    //about us delete
    public function aboutUsDelete($id){
        AboutUs::select('*')->where('id',$id)->delete();
        return back()->with(['success'=>'delete data successfully']);
    }




    //category
    public function category(){
        if(Auth::id()){
            if(Auth::user()->usertype=='admin'){
                return view('admin.category');
            }
            else{
                return back();
            }

    }
    else{
        return redirect('login');
    }
    }

    //upload product
    public function uploadCategory(Request $request){
       $request->validate([
        'categoryTitle'=>'required',

       ]);
        $data=[
            'categoryTitle'=>$request->categoryTitle,

        ];


        Category::create($data);

        return redirect()->route('admin#categoryList')->with(['category'=>$data,'success'=>'category create successfully']);
    }

    //product list
    public function categoryList(){
        $category=Category::all();
        return view('admin.categoryList',compact('category'));
    }

    //search category

    public function searchCategoryList(Request $request){

        if(Auth::id()){
            if(Auth::user()->usertype=='admin'){
                $searchList=$request->searchList;
                //$item=Slider::select('*')->get();
                //$items=ContactUs::all();
                //$user=auth()->user();
                $category=Category::all();
                //$cart=Cart::where('phone',$user->phone)->get();
                //$count=Cart::select('*')->where('phone',$user->phone)->count();
                $product=Product::orWhere('title','like','%'.$searchList.'%')
                              ->orWhere('subCategory','like','%'.$searchList.'%')
                              ->orWhere('price','like','%'.$searchList.'%')
                              ->orWhere('description','like','%'.$searchList.'%')
                              ->get();
                              return view('admin.productList',compact('product','category'));
            }
            else{
                return back();
            }

    }
         }

    //product edit
    public function categoryEdit($id){
        $data=Category::where('category_id',$id)->first();
        return view('admin.categoryEdit')->with(['editData'=>$data]);
    }

    //update product
    public function categoryUpdate($id,Request $request){
        $request->validate([
            'categoryTitle'=>'required',
           ]);
        $updateData=[
            'categoryTitle'=>$request->categoryTitle,
        ];

        Category::where('category_id',$id)->update($updateData);
        return redirect()->route('admin#categoryList')->with(['data'=>$updateData,'success'=>'update successfully']);

    }

    //product delete
    public function categoryDelete($id){
        Category::where('category_id',$id)->delete();
        return back()->with(['success'=>'category delete successfully']);
    }


    //sub category
    public function subCategory(){
        if(Auth::id()){
            if(Auth::user()->usertype=='admin'){
                $data=Category::all();
                // dd($data);
                return view('admin.subCategory',compact('data'));
            }
            else{
                return back();
            }

    }
    else{
        return redirect('login');
    }
    }

    //upload product
    public function uploadSubCategory(Request $request){
       $request->validate([
        'subCategory'=>'required|unique:sub_categories,subCategory',
       ]);

        $data=[
            'subCategory'=>$request->subCategory,
            'category_id'=>$request->categoryTitle,
        ];
        SubCategory::create($data);
        return redirect()->route('admin#subCategoryList')->with(['subCategory'=>$data,'success'=>'category create successfully']);

    }

    //product list
    public function subCategoryList(){
        // $category=Category::select('categories.*','sub_categories.*','categories.categoryTitle as cName')->join('sub_categories','categories.category_id','sub_categories.category_id')->get();
        // $category=Category::all();
        $items=SubCategory::all();
        return view('admin.subCategoryList',compact('items'));
    }

     //search sub category

     public function searchSubCategoryList(Request $request){

        if(Auth::id()){
            if(Auth::user()->usertype=='admin'){
                $searchList=$request->searchList;
                //$item=Slider::select('*')->get();
                //$items=ContactUs::all();
                //$user=auth()->user();
                $category=Category::all();
                //$cart=Cart::where('phone',$user->phone)->get();
                //$count=Cart::select('*')->where('phone',$user->phone)->count();
                $product=Product::orWhere('title','like','%'.$searchList.'%')
                              ->orWhere('subCategory','like','%'.$searchList.'%')
                              ->orWhere('price','like','%'.$searchList.'%')
                              ->orWhere('description','like','%'.$searchList.'%')
                              ->get();
                              return view('admin.productList',compact('product','category'));
            }
            else{
                return back();
            }

    }
         }

    //product edit
    public function subCategoryEdit($id){
        $data=SubCategory::where('sub_id',$id)->first();
        return view('admin.subCategoryEdit')->with(['editData'=>$data]);
    }

    //update product
    public function subCategoryUpdate($id,Request $request){
        $request->validate([
            'subCategory'=>'required',
           ]);
        $updateData=[
            'subCategory'=>$request->subCategory,
        ];

        SubCategory::where('sub_id',$id)->update($updateData);
        return redirect()->route('admin#subCategoryList')->with(['data'=>$updateData,'success'=>'update successfully']);

    }

    //product delete
    public function subCategoryDelete($id){
        SubCategory::where('sub_id',$id)->delete();
        return back()->with(['success'=>'category delete successfully']);
    }

}
