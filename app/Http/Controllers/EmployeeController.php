<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $userid = auth()->user()->id;
        $employees = $user->find($userid)->employee;
        $employeesArray = $employees->sortBy('name');
        return view("employees.index", ['employees' => $employeesArray]);
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
            'name' => 'required|max:13|min:3',
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
            'name' => 'required|max:13|min:3',
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
