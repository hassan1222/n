<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart1;
use App\Models\Order;

class HomeController extends Controller
{
    public function index()
    {
        // We need to get the product data from the product table.
        $product = Product::paginate(6);
        return view('home.userpage', compact('product'));
    }
    public function redirect()
    {

        // to check the user type and redirect the user to the admin or user dashboard accordingly.
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            // This is all for admin page
            // To count how much data is in product table 
            $total_product = product::all()->count();
            $total_order = order::all()->count();
            $total_user = user::all()->count();
            $order = order::all();
            $total_revenue = 0;

            foreach ($order as $order){
                $total_revenue = $total_revenue + $order->price;
            }
            $total_delivered = order::where('delivery_status', '=', 'delivered')->get()->count();
            $total_processing = order::where('delivery_status', '=', 'processing')->get()->count();
            return view('admin.home',compact('total_product','total_order','total_user','total_revenue','total_delivered','total_processing'));
        } else {
            $product = Product::paginate(6);
            return view('home.userpage', compact('product'));
        }
    }

    public function product_details($id)
    {
        $product = product::find($id);
        return view('home.product_details', compact('product'));
    }
    // We need to send the input type and the input quantity
    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $product = product::find($id);
            $cart1 = new cart1;
            $cart1->name = $user->name;
            $cart1->email = $user->email;
            $cart1->phone = $user->phone;
            $cart1->address = $user->address;
            $cart1->user_id = $user->id;
            $cart1->product_title = $product->title;
            // This will multiply the product with the quantity that is ordered.
            // If the quantity is 2 and its price is 7000 then it shall be 14000
            if ($product->discount_price != null) {
                $cart1->price = $product->discount_price * $request->quantity;

            } else {
                $cart1->price = $product->price * $request->quantity;
            }
            $cart1->image = $product->image;
            $cart1->Product_id = $product->id;
            $cart1->quantity = $request->quantity;

            $cart1->save();
            return redirect()->back();
        } else {
            return redirect('login');
        }
    }

    public function show_cart()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $cart1 = cart1::where('user_id', '=', $id)->get();
            return view('home.showcart', compact('cart1'));
        } else {
            return redirect('login');
        }

    }

    public function remove_cart($id)
    {
        $cart1 = cart1::find($id);
        $cart1->delete();
        return redirect()->back();

    }

    public function cash_order()
    {
        // Current user that is logged in.
        // To know which user placed the order
        $user = Auth::user();
        $userid = $user->id;
        $data = cart1::where('user_id', '=', $userid)->get();

        // Passing all the data from the cart to order table.
        // Those data that we require.
        foreach ($data as $data) {
            $order = new order;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->Product_id;

            $order->payment_status = 'Unpaid [Cash on Delivery]';
            $order->delivery_status = 'processing';
            $order->save();

            // To remove the data from cart once the order has been placed
            // That data is transferred to order table and data from cart is deleted once order has been placed
            $cart_id = $data->id;
            $cart1 = cart1::find($cart_id);
            $cart1->delete();
        }
        return redirect()->back();
    }
}
