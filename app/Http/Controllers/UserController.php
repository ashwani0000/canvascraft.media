<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = auth()->user();
        return view('users.edit', ['user'=> $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $data = $request->validate([
            'name' => 'required|max:13|min:2',
            'email' => 'required|email|unique:users,email,'.$user->id,
            ]
        );
        $user->update($data);
        return redirect()->route('dashboard');
    }

    public function index(Request $request, User $user){
        dd($user);
        dd($request);
        if($request->input('email')->get()){
            dd($request->get('email'));
            $email = $request->get('email');
            $data = $user->where('email', $email)->count();
            
            dd($data);
            if($data>0){
                echo 'notunique';
            }
            else{
                echo 'unique'; 
            }
        }
    }

    public function checkEmail(Request $request, User $user){
        $email = $request->input('email');
        $isExists = \App\Models\User::where('email',$email)->first();
        if($isExists){
            return response()->json(array("exists" => true));
        }else{
            return response()->json(array("exists" => false));
        }
    }

}
