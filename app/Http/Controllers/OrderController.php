<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Employee;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('employee')->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = Employee::where('status','!=','Vacaciones')->where('status','!=','Ocupado')->get();
        return view('orders.create',compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validated();
        $order = new Order();
        $order ->title = $request->input('title');
        $order ->description = $request->input('description');
        $order ->date = new \Datetime();
        $order ->employee_id = $request->input('employee_id');
        $order-> saved();

        return redirect('/orders')->with('status','Orden Creada Correctamente.'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $order = Order::with('employee')->find($order);
        $employee = Employee::where('status','!=','vacaciones')->where('status','!=','ocupado')->get();
        return view('orders.edit',compact('employee'))->with('order',$order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order = Order::find($order);
        $order ->title = $request->input('title');
        $order ->description = $request->input('description');
        $order ->employee_id = $request->input('employee_id');
        $order-> saved();
        
        return redirect('/orders')->with('status','Orden Actualizada Correctamente.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order = Order::find($order);
        $order->delete();

        return redirect('/orders')->with('status','Orden Eliminada Correctamente.'); 

    }
}
