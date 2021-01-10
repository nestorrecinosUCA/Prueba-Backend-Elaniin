<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as AppUser;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = AppUser::select('*')->paginate(10);
        return $all;
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
        $request->validate([
            'name' => 'required|string|max:191',
            'telephone' => 'required|integer',
            'username' => 'required|string', 
            'dob' => 'required|string', 
            'email' => 'required|string',
            'password' => 'required|string'  
        ]);

        $createUser = AppUser::create([
            'name' => $request->name,
            'telephone' => $request->telephone,
            'username' => $request->username,
            'dob' => $request->dob,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return $createUser;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = AppUser::select('id', 'name', 'telephone', 'dob', 'email')
        ->where('id', $id)
        ->get();
        return $user;
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
        $request->validate([
            'name' => 'required|string|max:191',
            'telephone' => 'required|integer',
            'username' => 'required|string', 
            'dob' => 'required|string', 
            'email' => 'required|string',
            'password' => 'required|string'  
        ]);

        $updateUser = AppUser::find($id);
        $updateUser->name = $request->name;
        $updateUser->telephone = $request->telephone;
        $updateUser->username = $request->username;
        $updateUser->dob = $request->dob;
        $updateUser->email = $request->email;
        $updateUser->password = bcrypt($request->password);
        $updateUser->save();
        return $updateUser;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteUser = AppUser::find($id);
        $deleteUser->delete();

        return ['Message' => 'User Deleted'];
    }
}
