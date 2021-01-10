<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as AppUser;


class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Getting the information of all the users
        $all = AppUser::select('*')
        ->paginate(10);

        return $all;//Returning the information found
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
        //Validating the information to be saved
        $request->validate([
            'name' => 'required|string|max:191',
            'telephone' => 'required|integer',
            'username' => 'required|string', 
            'dob' => 'required|string', 
            'email' => 'required|string',
            'password' => 'required|string'  
        ]);
        
        //Creating and saving the new user' information
        $createUser = AppUser::create([
            'name' => $request->name,
            'telephone' => $request->telephone,
            'username' => $request->username,
            'dob' => $request->dob,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return $createUser; //Returning the information saved.
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Showing a specific user
        $user = AppUser::select('*')
        ->where('id', $id)
        ->get();
        return $user; //Returning the information found
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
        //Validating the information
        $request->validate([
            'name' => 'required|string|max:191',
            'telephone' => 'required|integer',
            'username' => 'required|string', 
            'dob' => 'required|string', 
            'email' => 'required|email',
            'password' => 'required|string'  
        ]);
        
        //Updating the information
        $updateUser = AppUser::find($id);
        $updateUser->name = $request->name;
        $updateUser->telephone = $request->telephone;
        $updateUser->username = $request->username;
        $updateUser->dob = $request->dob;
        $updateUser->email = $request->email;
        $updateUser->password = bcrypt($request->password);
        $updateUser->save();

        return $updateUser; //Returning the information updated
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteUser = AppUser::find($id); //Finding the id of the user to be deleted
        $deleteUser->delete(); //Deleting user information

        return ['Message' => 'User Deleted']; //Returning a final message
    }
}
