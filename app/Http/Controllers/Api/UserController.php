<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        //
        return User::latest()->paginate(2);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //doing Validation Part
        //validation has two parameter $request & Rules
        $this->validate($request,[
        'name' => 'required|max:191',
        'email' => 'required|unique:users|email',
        'password' => 'required|string',
        'type' => 'required',
        'biodata' => 'required:max:191',
        ]);

        //If validation succesfull
        return User::create([
         'name'=>$request['name'],
         'email'=>$request['email'],
         'password'=>Hash::make($request['password']),
         'type'=>$request['type'],
         'biodata'=>$request['biodata'],
        ]);
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

    //Get authorised user link custom
    public function authuser()
    {
        //return Auth::user();
        //return User::findOrFail(42);
        return auth()->user();
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
        //
        $userupdate = User::findOrFail($id);

        $this->validate($request,[
        'name' => 'required|max:191',
        'email' => 'required|email|unique:users,email,'.$userupdate->id, // Important sequesces
        'password' => 'required|string',
        'type' => 'required',
        'biodata' => 'required:max:191',
        ]);
        //Hash::make($request['password']),
        //$userupdate->update($request->all());
        $userupdate->name = $request->name;
        $userupdate->email = $request->email;
        $userupdate->password = Hash::make($request->password);
        $userupdate->type = $request->type;
        $userupdate->biodata= $request->biodata;
        $userupdate->save();

        return response(['message'=>'Updated succesfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

        
        //find or fail
        {    
            $user = User::findOrFail($id);
            $user->delete();

            //return response
            return response(['message'=>'User deleted']);
        }
    }
}
