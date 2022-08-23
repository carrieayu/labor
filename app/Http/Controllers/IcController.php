<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\t_ic;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class IcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return t_ic::all();
        // $timecard = DB::table('t_ics')
        //     ->join('t_employees','t_ics.employee_id', '=', 't_employees.id')
        //     ->get();

        // return $timecard;
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
        // $timecard = DB::table('t_ics')
        //     ->join('t_employees','t_ics.employee_id', '=', 't_employees.id')
        //     ->where('t_ics.employee_id', '=', $id)
        //     ->get();

        // return $timecard;

        return t_ic::find($id);
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
        $icInfo = t_ic::find($id);

        if($icInfo) {
            $data = $request->all();
            $validator = Validator::make($data, [
                'state'         =>  'string',
                'employee_id'   =>  'integer',
                'valid_until_for_ic'    => 'date',
                'date_allocated'    => 'date',
                'date_released'     => 'date',
                'serial_no'         => 'string',
                'input_class'       => 'string',
                'terminal_no'       => 'string',
                'other_class'       => 'string',
                'logic_address1'    => 'string',
                'logic_address2'    => 'string',
                'note'              => 'string',
                'created_datetime'  => 'nullable',
            ]);

            if($validator->fails()) {
                return response(['error' => $validator->errors(), 'Validation Error']);
            }

            $icInfo->update([
                'state'         => $request->state,
                'employee_id'   => $request->employee_id,
                'valid_until_for_ic'    => $request->valid_until_for_ic,
                'date_allocated'        => $request->date_allocated,
                'date_released'         => $request->date_released,
                'serial_no'             => $request->serial_no,
                'input_class'           => $request->input_class,
                'terminal_no'           => $request->terminal_no,
                'other_class'           => $request->other_class,
                'logic_address1'        => $request->logic_address1,
                'logic_address2'        => $request->logic_address2,
                'note'                  => $request->note,
                'created_datetime'      => $request->created_datetime,
            ]);

            $responseMessage = "IC Updated Successfully";

            return response()->json([
                'success'   => true,
                'message'   => $responseMessage,
                'data'      => $icInfo
            ],200);

        }else {
            $responseMessage = "IC Data not Found";
            return response()->json([
                'success'   => false,
                'message'   => $responseMessage,
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
