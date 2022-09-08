<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\t_group;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return t_group::all();
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
            'color_code'    => 'string',
            'note'          => 'string',
        ]);

        if($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $groupInfo = t_group::create([
            'name'          => $request->name,
            'color_code'    => $request->color_code,
            'note'          => $request->note,
        ]);

        $responseMessage = "Group Created Successfully";

        return response()->json([
            'success'   => true,
            'message'   => $responseMessage,
            'data'      => $groupInfo
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
        $groupInfo = t_group::find($id);

        if($groupInfo){
            $data = $request->all();
            $validator = Validator::make($data, [
                'name'          => 'string',
                'color_code'    => 'string',
                'note'          => 'string',
            ]);

            if($validator->fails()){
                return response(['error' => $validator->errors(), 'Validation Error']);
            }

            $groupInfo->update([
                'name'          => $request->name,
                'color_code'    => $request->color_code,
                'note'          => $request->note,
                'modified_datetime' => Carbon::now('Asia/Manila'),
            ]);

            $resMessage = "Group Update Success";

            return response()->json([
                'success'   => true,
                'message'   => $resMessage,
                'data'      => $groupInfo
            ], 200);
        }else {
            $resMessage = "Group Update Failed";

            return response()->jaon([
                'success'   => false,
                'message'   => $resMessage,
            ], 100);
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
