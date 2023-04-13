<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// passing category model
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
class AdminController extends Controller{
    //
    public function view_category(){
        // Using the model above use.... we get the data from category table.
        //Getting data from the category table when we use compact to call data.
        $data = category::all();
        return view('admin.category',compact('data'));   
    }

    // This function will add new category and save it when the request is sent.
    public function add_category(Request $request){
        $data = new category;
        $data->category_name = $request->category;
        $data->save();
        return redirect()->back()->with('message','Category Added Successfully!');

    }

    public function delete_category($id){
        //First find that id to delete
        //Then delete the category with its respective id.
        $data = category::find($id);
        $data->delete();
        return redirect()->back()->with('message','Category Deleted Successfully!');
    }

    public function view_product(){
        //To get the data from the category table.
        $category = category::all(); 
        return view('admin.product',compact('category'));
    }

    public function add_product(Request $request){
        $product = new product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity; 
        $product->discount_price = $request->discount_price;
        $product->category = $request->category;
        // We getting the image and storing this in the image table.
        // Givining the image name using the time function and every image will have a different name using this time function

        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        // storing image in the product folder
        $request->image->move('product', $imagename);
        $product->image = $imagename;
        $product->save();
        return redirect()->back()->with('message','Product Added Successfully!');



    }
    public function show_product(){
        // Catch the data from product 
        $product = product::all();
        return view('admin.show_product',compact('product'));
    }
    public function delete_product($id){
        $product = product::find($id);
        $product->delete();
        return redirect()->back()->with('message','Product Removed Successfully!');
    }
    public function update_product($id){
        $product = product::find($id);
        $category = category::all();
        return view('admin.update_product',compact('product','category'));
    }
    public function update_product_confirm(Request $request,$id){
        $product = product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $image = $request->image;
        if($image){
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            // Adding in product folder 
            $request->image->move('product', $imagename);
            // Saving it in database
            $product->image = $imagename;
        }
       
        $product->save();
        return redirect()->back()->with('message','Product Updated Successfully!');
    }

    public function orders(){
        $order = order::all();
        return view('admin.orders',compact('order'));
    }

    public function delivered($id){
        $order = order::find($id);
        // Changing the order status from processing to delivered
        $order->delivery_status = "delivered";
        $order->payment_status = 'Paid';
        $order->save();
        return redirect()->back();
    }
// I am implementing AJAX HERE
    public function show(){
        return view('admin.ajaxdata');
    }
    public function getproducts(){
       $products = Product::all();
        return response()->json($products);
    }
}