<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

  public function index()
  {
    $orders = Order::all();
    return view('order.index', compact('orders')); 
  }
  
  public function delete(Request $request)
    {
        Order::where('id', $request->id)->delete();
        return redirect(route('transaction'));
    }
}
