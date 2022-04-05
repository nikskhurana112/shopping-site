<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function ordersList(){

        $order = Order::latest()->paginate(10);
        return view("order.orders_list")->with(["orders" => $order]);
    }
}
