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
    public function index()
    {
        return view("employees.index", ['employees' => auth()->user()->employees->sortBy('name')]);
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
    public function store(Request $request, Employee $employee, User $user)
    {
        
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        
        

        $request->validate([
            'name' => 'required|max:13|min:3',
            'email' => 'required|email|unique:employe,email,'.$employee->id,
        ]);

        $employee->user_id = auth()->user()->id;
        ($employee->user()->associate($request->user()));
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

        if(auth()->user()->id == $employee->user_id){
            $employeeDetail = $employee;    
            return view('employees.show', ['employeeDetail' => $employeeDetail]);
            }else{
                dd('Employee Not Found');  
            }

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee, User $user)
    {
        if(auth()->user()->id == $employee->user_id){
        return view('employees.edit', ['employeeDetail' => $employee]);
        }else{
            dd('Employee Not Found');  
        }
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
        // dd($employee);
        $data = $request->validate([
            'name' => 'required|max:13|min:3',
            'email' => 'required|email|unique:employe,email,'.$employee->id
            ]
        );
        

        $employee->update($data);
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee){

    if(auth()->user()->id == $employee->user_id){
        $employee->delete();
        return redirect()->route('employees.index');
        }else{
            dd('Employee Not Found');  
        }
}
}