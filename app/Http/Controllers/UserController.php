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


}
