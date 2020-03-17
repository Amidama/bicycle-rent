<?php

namespace App\Http\Controllers;

use App\Locker;
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
      $order = Order::where('id', $request->id)->first();
      Locker::where('id', $order->locker()->first()->id)->update([ 'available' => true]);
      $order->delete();
      return redirect(route('transaction'));
    }
}
