<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function rent($id){
        $order=new Order;
        $order->account_id=auth()->user()->id;
        $order->ebook_id=$id;
        $order->order_date=date('Y-m-d H:i:s');
        $order->save();
        return redirect('/home')->with('success','Add Cart Success');
    }
    public function cart(){
        return view('pages.cart',['carts'=>Order::get()]);
    }
    public function delete($id){
        Order::where('order_id','=',$id)->delete();
        return redirect('/home')->with('success','Delete Cart Success');
    }
    public function submit(){
        Order::where("account_id","=",auth()->user()->id)->delete();
        return view('pages.success');
    }
}
