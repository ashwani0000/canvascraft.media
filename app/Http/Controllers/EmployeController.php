<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emloyeesAllofCompany = new Employee;
        $employeesofacompany = $emloyeesAllofCompany->getEmployeesOfaCompany();
        return view("employees.index", ['employees'=> $employeesofacompany]);
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
    public function show($user_id)
    {
        $employeeDetail = Employee::find($user_id);
        $employeeName = $employeeDetail->name;
        $employeeEmail = $employeeDetail->email;
        $employeeId  = $employeeDetail->id;
        
        return view('employees.show', ['employeeName' => $employeeName, 'employeeEmail' => $employeeEmail, 'employeeId' => $employeeId]);

        // $employeArray = DB::table('employe')->where('user_id', $user_id)->get();
        
       

        // return view('employes.employe', ['employes'=> $employeArray]);
         // print_r($employeArray);

        
        // $employeDetails = DB::table('employe')->select('name','email')->get();

        // print_r($employeDetails);
        // $employe = $employeArray

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $employeeDetail = Employee::find($id);
        $employeeName = $employeeDetail->name;
        $employeeEmail = $employeeDetail->email;
        $employeeId = $employeeDetail->id;

        // dd($employeName,$employeDetail,$employeEmail);

        return view('employees.edit', ['employeeName' => $employeeName, 'employeeEmail' => $employeeEmail, 'employeeId' => $employeeId]);
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

        DB::table('employe')->where('id',$id)->update(['name'=> $updatedName , 'email'=> $updatedEmail]);
        
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
