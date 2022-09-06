<?php

namespace App\Http\Controllers;

use App\Http\Requests\FieldRequest;
use App\Models\Employee;
use App\Models\User;

use \Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Empty_;

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
        $employee = Employee::where('user_id' ,$userid)->paginate(5);
        return view("employees.index", ['employees' => $employee]);
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
    public function store(Request $request, Employee $employee, FieldRequest $fieldRequest)
    {
        
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        
        $fieldRequest->validated();

        $employee->user_id = auth()->user()->id;
        ($employee->user()->associate($request->user()));
        $employee->save();
        return redirect()->route('employees.index')->with('success', 'Employee Added Successfully');

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
    public function update(FieldRequest $request,Employee $employee)
    {
        // dd($employee);
        $data = $request->validated();
        $employee->update($data);
        return redirect()->route('employees.index')->with('success','Employee Updated Successfully');
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
        return redirect()->route('employees.index')->with('warning','Employee Deleted Successfully')->with('danger', 'Employee Details Deleted Successfully');
        }else{
            dd('Employee Not Found');  
        }
}

public function data()
    {
        $userid = auth()->user()->id;
        $data = Employee::where('user_id' ,$userid)->orderBy('id', 'desc')
        ->get();
    
    return DataTables::of($data)
            // ->addColumns('name', 'email')    
            ->addColumn('Action', function($row) {
                   return '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    
}