<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $data = $request->all();
        $user = User::find($id);
        $validator = Validator::make($data, [
            'full_name'           => ['required', 'min:5'],
            'username'           => ['required', 'min:2', 'unique:users,username,'.$user->id],
            'email'           => ['required', 'email', 'unique:users,email,'.$user->id],
            'password'           => ['nullable','min:6', 'string'],
            'no_handphone'           => ['required', 'min:9', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'max:14'],
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        } else {
            # code...
            $data['password'] = $user->password;
        }
        
        $user->update($data);
        if ($user) {
            return redirect()->back()->with('success', 'Data Has Been Updated');
        } else {
            return redirect()->back()->with('error', 'Data Error');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
