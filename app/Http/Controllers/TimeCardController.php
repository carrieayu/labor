<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\t_timecard;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;   
use Carbon\Carbon;

class TimeCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return t_timecard::all();
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
        $result = DB::select("SELECT *, t_timecards.id as t_timecards_id, t_employees.id as t_employee_id, t_timecards.note as t_timecards_note FROM t_timecards INNER JOIN t_employees ON t_timecards.employee_id = t_employees.id WHERE t_employees.id = :id", ['id' => $id]);
        return $result;
        // $timecard = DB::table('t_timecards')
        //     ->join('t_employees','t_timecards.employee_id', '=', 't_employees.id')
        //     ->select('*')
        //     ->select('t_employees.id AS t_employee_id')
        //     ->where('t_employees.id', '=', $id)
        //     ->get();

        // return $timecard;


    }

    public function retrieve($id){
        return t_timecard::find($id);
    }

    public function tcById(Request $request, $id){
        $data = $request->all();
        $validator = Validator::make($data, [
            'date'  => 'required'
        ]);

        if($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $employeeTimeCard = t_timecard::where([['start_date', $request->date], ['employee_id', $id]])->first();

        $message = "Retrieve Success";

        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $employeeTimeCard
        ], 200);
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
        $tcInfo = t_timecard::find($id);

        if($tcInfo){
            $data = $request->all();
            $validator = Validator::make($data, [
                'serial_no'         => 'string',
                'start_date'        => 'date',
                'end_date'          => 'date',
                'start_time'        => 'date_format:H:i:s',
                'end_time'          => 'date_format:H:i:s',
                'note'              => 'string',
            ]);

            if($validator->fails()){
                return response(['error' => $validator->errors(), 'Validation Error']);
            }

            $tcInfo->update([
                'serial_no'         => $request->serial_no,
                'start_date'        => $request->start_date,
                'end_date'          => $request->end_date,
                'start_time'        => $request->start_time,
                'end_time'          => $request->end_time,
                'note'              => $request->note,
                'modified_datetime' => Carbon::now('Asia/Manila'),
            ]);

            $resMessage = "Time Card Updated";

            return response()->json([
                "success"   => true,
                "message"   => $resMessage,
                "data"      => $tcInfo
            ], 200);

        }else {
            $resMessage = "Updating Timecard failed";

            return response()->json([
                "success"   => false,
                "message"   => $resMessage
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
