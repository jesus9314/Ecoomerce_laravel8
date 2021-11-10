<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function index(){

        $orders = Order::query()->where('user_id',auth()->user()->id);

        if (request('status')) {
            $orders->where('status',request('status'));
        }

        $orders = $orders->get();

        $status['pendiente'] = Order::where('status',1)->where('user_id',auth()->user()->id)->count();
        $status['recibido'] = Order::where('status',2)->where('user_id',auth()->user()->id)->count();
        $status['enviado'] = Order::where('status',3)->where('user_id',auth()->user()->id)->count();
        $status['entregado'] = Order::where('status',4)->where('user_id',auth()->user()->id)->count();
        $status['anulado'] = Order::where('status',5)->where('user_id',auth()->user()->id)->count();

        return view('orders.index',compact('orders','status'));
    }

    public function show(Order $order){

        $this->authorize('author',$order);

        $items = json_decode($order->content);

        return view('orders.show', compact('order','items'));
    }

    public function pay(Order $order, Request $request){

        $this->authorize('author',$order);

        $payment_id = $request->get('payment_id');

        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id". "?access_token=APP_USR-5141569255487796-110915-60ea4291e3e5569618549cae2d5205d7-1015525502");
        $response = json_decode($response);

        $status = $response->status;
        if($status == 'approved'){
            $order->status = 2;
            $order->save();
        }
        return redirect()->route('orders.show',$order);
    }
}
