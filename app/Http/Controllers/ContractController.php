<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContractRequest;
use App\Models\Contract;
use App\Models\Employee;

class ContractController extends Controller{

    public function index(){
        $contracts = Contract::orderBy('employee_id', 'ASC')->get();
        return view('contracts.index', compact('contracts'));
    }


    public function create(Employee $employee){
        return view('contracts.create', compact('employee'));
    }


    public function store(ContractRequest $request, Employee $employee){
        $validated = $request->validated();
        $contract = new Contract();
        $contract->name = $request->input('name');
        $contract->description = $request->input('description');
        $contract->initial_date = date('Y-m-d');
        $contract->final_date = $request->input('final_date');
        $contract->employee_id = $employee->id;
        $contract->job_id = $request->input('job_id');
        $contract->planning_id = $request->input('planning_id');
        $contract->status = Contract::$ACTIVE;
        $contract->save();
        return redirect()->route('contracts.index')->with('success', 'Contrato creado correctamente');
    }


    public function show(Contract $contract){
        //
    }


    public function edit(Contract $contract, Employee $employee){
        return view('contracts.edit', compact('contract', 'employee'));
    }


    public function update(ContractRequest $request, Contract $contract){
        $validated = $request->validated();
        $contract->name = $request->input('name');
        $contract->description = $request->input('description');
        $contract->final_date = $request->input('final_date');
        $contract->job_id = $request->input('job_id');
        $contract->planning_id = $request->input('planning_id');
        $contract->save();
        return redirect()->route('contracts.index')->with('success', 'Contrato creado correctamente');
    }


    public function destroy(Contract $contract){
        try{
            Contract::findOrFail($contract->id);
            $contract->status = Contract::$CANCELED;
            $contract->save();
        }catch (\Exception $e){
            return redirect()->route('contracts.index')->with('failed', 'El contrato que intento cancelar no se encontro');
        }
        return redirect()->route('contracts.index')->with('success', 'Contrato cancelado correctamente');
    }

}
