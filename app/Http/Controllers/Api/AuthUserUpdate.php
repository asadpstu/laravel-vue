<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AuthUserUpdate extends Controller
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
        //
                //
        $userupdate = User::findOrFail($id);

        $this->validate($request,[
        'name' => 'required|max:191',
        'email' => 'required|email|unique:users,email,'.$userupdate->id, // Important sequesces
        'education' => 'required:max:191',
        'location' => 'required:max:191',
        'skills' => 'required:max:191',
        'notes' => 'required:max:191',
        'profession' => 'required:max:191',
        ]);

        $userupdate->update($request->all());

        return response(['message'=>'Updated succesfully']);
    }

    public function picupdate(Request $request)
    {
        return response(['message'=>$request->photo]);
        //return response(['message'=>'Pic update request']);
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
