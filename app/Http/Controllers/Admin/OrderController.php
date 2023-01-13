<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

use App\Http\Requests\MassDestroyOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Product;
use Carbon\Carbon;
use Session;
use Gate;
use Validator, Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\Response;



class OrderController  extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
  $orders = Order::with('products')->get();
    return view('admin.order.index', compact('orders'));

    
    }
public function create()
{
    $products = Product::all();
    return view('admin.order.create', compact('products'));
}

public function store(Request $request)
{
    $order = Order::create($request->all());

    $products = $request->input('products', []);
    $quantities = $request->input('quantities', []);
    for ($product=0; $product < count($products); $product++) {
        if ($products[$product] != '') {
            $order->products()->attach($products[$product], ['quantity' => $quantities[$product]]);
        }
    }

    return back();
}

public function edit(Order $order)
    {
        $products = Product::all();

        $order->load('products');

        return view('admin.order.edit', compact('products', 'order'));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->all());

        $order->products()->detach();
        $products = $request->input('products', []);
        $quantities = $request->input('quantities', []);
        for ($product=0; $product < count($products); $product++) {
            if ($products[$product] != '') {
                $order->products()->attach($products[$product], ['quantity' => $quantities[$product]]);
            }
        }

        return redirect()->route('admin.order.index');
    }

    public function show(Order $order)
    {
       

        $order->load('products');

        return view('admin.order.show', compact('order'));
    }

    public function destroy(Order $order)
    {
       
        $order->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrderRequest $request)
    {
        Order::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
