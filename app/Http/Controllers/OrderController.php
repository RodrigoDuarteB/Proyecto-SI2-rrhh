<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Employee;
use App\Models\OrderEmployees;
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
        //   try {

        $validated = $request->validated();
        $order = new Order();

        $order->title = $request->input('title');
        $order->description = $request->input('description');
        $order->datetime = new \Datetime();

        //obteniendo la informacion del usuario logueado
        $login_user = Employee::find(auth()->id());
        $order->employee_id = $login_user->id;
        $order->save();

        $order_employee = new OrderEmployees();

        $employee1 = $request->input('employee_id_1');
        $employee2 = $request->input('employee_id_2');
        $employee3 = $request->input('employee_id_3');

        if ($employee1 != '0') {

            $order_employee->order_id = $order->id;
            $order_employee->employee_id = $employee1;
            $order_employee->acomplished = false;
            $order_employee->datetime = new \Datetime();
            $order_employee->save();
        }

        if ($employee2 != '0') {

            $order_employee2 = new OrderEmployees();

            $order_employee2->order_id = $order->id;
            $order_employee2->employee_id = $employee2;
            $order_employee2->acomplished = false;
            $order_employee2->datetime = new \Datetime();
            $order_employee2->save();
        }

        if ($employee3 != '0') {
            $order_employee3 = new OrderEmployees();

            $order_employee3->order_id = $order->id;
            $order_employee3->employee_id = $employee3;
            $order_employee3->acomplished = false;
            $order_employee3->datetime = new \Datetime();
            $order_employee3->save();
        }

        return redirect('/orders')->with('success', 'Orden Creada Correctamente.');

        //  } catch (\Exception $e) {
        //      return redirect()->route('orders.index')->with('status', 'Ocurrió un error al registrar una Nueva Orden de Trabajo');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $orders = Order::with('employee')->with('employees')->find($order->id);
        return view('orders.show')->with('orders', $orders);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //  try {

        $orders = Order::with('employee')->with('employees')->find($order->id);
        $employees = Employee::where('status', '!=',  Employee::$FIRED)->where('status', '!=', Employee::$VACATION)->get();

        return view('orders.edit', compact('employees'))->with('orders', $orders);

        //  } catch (\Exception $e) {
        //      return redirect()->route('orders.index')->with('info', 'Ocurrió un error al intentar editar la Orden de Trabajo');
        //  }
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
        //  try {
        $validated = $request->validated();
        $order = Order::find($order->id);

        $order->title = $request->input('title');
        $order->description = $request->input('description');
        $order->datetime = new \Datetime();

        //obteniendo la informacion del usuario logueado
        //$login_user = Employee::find(auth()->id());
        //  $order->employee_id = $login_user->id;
        //   $order->save();

        $employee1 = $request->input('employee_id_1');
        $employee2 = $request->input('employee_id_2');
        $employee3 = $request->input('employee_id_3');



        //////////--------------1---------------------/////////////////////

        //buscando en la tabla intermedia todos los asignados registrados
        $order_employee = OrderEmployees::where('order_id', '=', $order->id)->get();


        

        if ($employee1 != '0' and $employee1 != 'delete') {
            //pregunta si esta vacio el array q se consulta para crear uno nuevo o reemplazar el ya asignado
            if ($order_employee == '[]') {

                $order_employee = new OrderEmployees();

                $order_employee->order_id = $order->id;
                $order_employee->employee_id = $employee1;
                $order_employee->acomplished = false;
                $order_employee->datetime = new \Datetime();
                $order_employee->save();
            } else {

                //pregunta si es el mismo asignado para no hacer nada y si no remplaza el nuevo asignado
                if ($order_employee[0]->employee_id != $employee1) {

                    $order_employee[0]->employee_id = $employee1;
                    $order_employee[0]->save();
                }
            }
        }

        //////////--------------2---------------------/////////////////////
        $order_employee = OrderEmployees::where('order_id', '=', $order->id)->get();
        if ($employee2 != '0' and $employee2 != 'delete') {
            //pregunta si esta vacio el array q se consulta para crear uno nuevo o reemplazar el ya asignado
            if (count($order_employee) < 2 and count($order_employee) == 1) { //se asegura q antes de ingresar un nuevo Asignado,ya haya 1

                $order_employee = new OrderEmployees();

                $order_employee->order_id = $order->id;
                $order_employee->employee_id = $employee2;
                $order_employee->acomplished = false;
                $order_employee->datetime = new \Datetime();
                $order_employee->save();
            } else {

                //pregunta si es el mismo asignado para no hacer nada y si no remplaza el nuevo asignado
                if ($order_employee[1]->employee_id != $employee2) {

                    $order_employee[1]->employee_id = $employee2;
                    $order_employee[1]->save();
                }
            }
        }

        //////////--------------3---------------------/////////////////////
        $order_employee = OrderEmployees::where('order_id', '=', $order->id)->get();
        if ($employee3 != '0' and $employee3 != 'delete') {
            //pregunta si esta vacio el array q se consulta para crear uno nuevo o reemplazar el ya asignado

            if (count($order_employee) < 3 and count($order_employee) == 2) { //se asegura q antes de ingresar un nuevo Asignado,ya hayan 2

                $order_employee = new OrderEmployees();

                $order_employee->order_id = $order->id;
                $order_employee->employee_id = $employee3;
                $order_employee->acomplished = false;
                $order_employee->datetime = new \Datetime();
                $order_employee->save();
            } else {

                //pregunta si es el mismo asignado para no hacer nada y si no remplaza el nuevo asignado
                if ($order_employee[2]->employee_id != $employee3) {

                    $order_employee[2]->employee_id = $employee3;
                    $order_employee[2]->save();
                }
            }
        }

        //////metodos eliminar

        if ($employee3 == 'delete' and $employee2 == 'delete' and $employee1 == 'delete') {
            $order_employee[2]->delete();
            $order_employee[1]->delete();
            $order_employee[0]->delete();
        }
        if ($employee1 == 'delete' and $employee2 == 'delete') {
            $order_employee[1]->delete();
            $order_employee[0]->delete();
        }
        if ($employee1 == 'delete' and $employee3 == 'delete') {
            $order_employee[2]->delete();
            $order_employee[0]->delete();
        }
        if ($employee2 == 'delete' and $employee3 == 'delete') {
            $order_employee[2]->delete();
            $order_employee[1]->delete();
        }

        if ($employee3 == 'delete') {
            $order_employee[2]->delete();
        }
        if ($employee2 == 'delete') {
            $order_employee[1]->delete();
        }
        if ($employee1 == 'delete') {
            $order_employee[0]->delete();
        }

        $order->save();



        return redirect('/orders')->with('status', 'Orden Actualizada Correctamente.');
        // } catch (\Exception $e) {
        //      return redirect()->route('orders.index')->with('info', 'Ocurrió un error al intentar Actualizar la Orden de Trabajo');
        //  }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //try {
            $order = Order::find($order->id);
            $order_employee = OrderEmployees::where('order_id', '=', $order->id)->get();
            foreach ($order_employee as $order_employee){
                $order_employee->delete();
            }
            $order->delete();
            return redirect('/orders')->with('status', 'Orden Eliminada Correctamente.');
        
        //} catch (\Exception $e) {
          //  return redirect()->route('employees.index')->with('info', 'Ocurrió un error al intentar despedir el empleado');
        //}
    }
}
