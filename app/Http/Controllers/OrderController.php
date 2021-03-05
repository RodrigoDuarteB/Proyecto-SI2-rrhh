<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
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
        $orders = Order::with('employee')->with('employees')->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::where('status', '!=',  Employee::$FIRED)->where('status', '!=', Employee::$VACATION)->get();
        return view('orders.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        try {
            $validated = $request->validated();
            $order = new Order();
            $order->title = $request->input('title');
            $order->description = $request->input('description');
            $order->date = new \Datetime();
            $order->employee_id = $request->input('employee_id');
            $order->save();
        } catch (\Exception $e) {
            return redirect()->route('orders.index')->with('info', 'Ocurrió un error al registrar una Nueva Orden de Trabajo');
        }
        return redirect('/orders')->with('status', 'Orden Creada Correctamente.');
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
        try {

            $order = Order::with('employee')->find($order->id);
            $employee = Employee::where('status', '!=', 'vacaciones')->where('status', '!=', 'ocupado')->get();
        } catch (\Exception $e) {
            return redirect()->route('orders.index')->with('info', 'Ocurrió un error al intentar editar la Orden de Trabajo');
        }
        return view('orders.edit', compact('employee'))->with('order', $order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, Order $order)
    {
        try {
            $order = Order::find($order->id);
            $order->title = $request->input('title');
            $order->description = $request->input('description');
            $order->employee_id = $request->input('employee_id');
            $order->saved();
        } catch (\Exception $e) {
            return redirect()->route('orders.index')->with('info', 'Ocurrió un error al intentar Actualizar la Orden de Trabajo');
        }
        return redirect('/orders')->with('status', 'Orden Actualizada Correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        try {
            $order = Order::find($order->id);
            $order->delete();
        } catch (\Exception $e) {
            return redirect()->route('employees.index')->with('info', 'Ocurrió un error al intentar despedir el empleado');
        }
        return redirect('/orders')->with('status', 'Orden Eliminada Correctamente.');
    }
}
