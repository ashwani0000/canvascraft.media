<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid = auth()->user()->id;
        $employeeArray = Employee::where( 'user_id' , $userid)->get();
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
    public function store(Request $request)
    {
        $employee = new Employee;

        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->user_id = auth()->user()->id;

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
    public function update(Request $request, $id)
    {
        $updatedName = $request->input('name');
        $updatedEmail = $request-> input('email');

        $request->validate([
            'name' => 'required|max:10|min:5',
            'email' => 'required|email',
        ]);

        Employee::where('id', $id)->update(['name'=> $updatedName , 'email'=> $updatedEmail]);
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findRow = Employee::find($id);
        $findRow->delete();
        return redirect()->route('employees.index');
    }
}
