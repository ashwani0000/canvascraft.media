<?php

namespace App\Http\Controllers;

use App\Models\EmployeModel;
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
        $user_idd = auth()->user()->id;

        $employeArray = DB::table('employe')->where('user_id', $user_idd)->get();
        return view('employes.employe', ['employes'=> $employeArray]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employes.addemploye');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = new EmployeModel;

        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->user_id = auth()->user()->id;

        $request->validate([
            'name' => 'required|max:10|min:5',
            'email' => 'required|email',
        ]);

        
        
        $employee->save();

        return redirect('/employes');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
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
        $employeDetail = EmployeModel::find($id);
        $employeName = $employeDetail->name;
        $employeEmail = $employeDetail->email;
        $employeId = $employeDetail->id;

        // dd($employeName,$employeDetail,$employeEmail);

        return view('employes.editEmploye', ['employeName' => $employeName, 'employeEmail' => $employeEmail, 'employeId' => $employeId]);
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
        
        return redirect('/employes');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findRow = EmployeModel::find($id);
        $findRow->delete();
        return redirect('/employes');
    }
}
