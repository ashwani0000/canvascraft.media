<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Employee $employee)
    {

        

        $userid = auth()->user()->id;
        $employeeArray = $employee->where( 'user_id' , $userid)->orderBy('name')->get();
        return view("employees.index", ['employees'=> $employeeArray]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Employee $employee)
    {
        
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->user_id = auth()->user()->id;
        ($employee->user()->associate($request->user()));
        

        $request->validate([
            'name' => 'required|max:10|min:5',
            'email' => 'required|email',
        ]);

        $employee->save();
        return redirect()->route('employees.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $employeeDetail = $employee;    
        return view('employees.show', ['employeeDetail' => $employeeDetail]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $employeeDetail = $employee;
        return view('employees.edit', ['employeeDetail' => $employeeDetail]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Employee $employee)
    {
        $updatedName = $request->input('name');
        $updatedEmail = $request-> input('email');

        $request->validate([
            'name' => 'required|max:10|min:5',
            'email' => 'required|email',
        ]);

        $employee->update(['name'=> $updatedName , 'email'=> $updatedEmail]);
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {

        $employee->delete();
        return redirect()->route('employees.index');
    }
}
