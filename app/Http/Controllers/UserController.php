<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\t_user;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return t_user::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name'          => 'string',
            'mail'          => 'string',
            'employee_id'   => 'integer',
            'password'      => 'required|string|confirmed',
            'valid_until_for_pw'    => 'date',
            'note'          => 'string',
            'role'          => 'string'
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $userInfo = t_user::create([
            'name'          => $request->name,
            'mail'          => $request->mail,
            'employee_id'   => $request->employee_id,
            'password'      => $request->password,
            'valid_until_for_pw'    => $request->valid_until_for_pw,
            'note'          => $request->note,
            'role'          => $request->role
        ]);

        $responseMessage = "User Registration Successful";

        return response()->json([
            'success'   => true,
            'message'   => $responseMessage,
            'data'      => $userInfo
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return t_user::find($id);
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
        $userInfo = t_user::find($id);

        if($userInfo){
            $data = $request->all();
            $validator = Validator::make($data, [
                'name'          => 'string',
                'mail'          => 'string',
                'employee_id'   => 'integer',
                'password'      => 'required|string|confirmed',
                'valid_until_for_pw'    => 'date',
                'note'          => 'string',
                'role'          => 'string'
            ]);

            if($validator->fails()){
                return response(['error' => $validator->errors(), 'Validation Error']);
            }

            $userInfo->update([
                'name'          => $request->name,
                'mail'          => $request->mail,
                'employee_id'   => $request->employee_id,
                'password'      => $request->password,
                'valid_until_for_pw'    => $request->valid_until_for_pw,
                'note'          => $request->note,
                'role'          => $request->role
            ]);

            $resMessage = "Updating User Success";

            return response()-> json([
                'success'   => true,
                'message'   => $resMessage,
                'data'      => $userInfo
            ],200);


        }else {
            $resMessage = "Updating user failed";

            return response()->json([
                'success'   => false,
                'message'   => $resMessage
            ],100);
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
