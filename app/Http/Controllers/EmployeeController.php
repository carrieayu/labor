<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\t_employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return t_employee::all();
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employeeInfo = t_employee::find($id);

        if($employeeInfo) {
            $data = $request->all();
            $validator = Validator::make($data, [
                'name'                  => 'string',
                'kana'                  => 'string',
                'birthday'              => 'date',
                'phone_no1'             => 'string',
                'phone_no2'             => 'string',
                'mail'                  => 'string',
                'postal_code'           => 'string',
                'address'               => 'string',
                'emergency_contact_name' => 'string',
                'emergency_contact_no'   => 'string',
                'hire_date'             => 'date',
                'retirement_date'       => 'date',
                'guarantor_name'        => 'string',
                'guarantor_phone_no1'   => 'string',
                'guarantor_phone_no2'   => 'string',
                'guarantor_postal_code' => 'string',
                'guarantor_address'     => 'string',
                'guarantor_relationship'=> 'string',
                'insurance_card_no'     => 'string',
                'employee_key'          => 'string',
                'official_position'     => 'string',
                'contract_code'         => 'string',
                'contract_type'         => 'string',
                'salary_type'           => 'string',
                'working_hours_per_day' => 'integer',
                'note'                  => 'string',
                'reason_for_retirement' => 'string',
                'created_datetime'      => 'nullable',
                'modified_datetime'     => 'nullable'

            ]);

            if($validator->fails()){
                return response(['error' => $validator->errors(), 'Validation Error']);
            }

            $employeeInfo->update([
                'name'                  => $request->name,
                'kana'                  => $request->kana,
                'birthday'              => $request->birthday,
                'phone_no1'             => $request->phone_no1,
                'phone_no2'             => $request->phone_no2,
                'mail'                  => $request->mail,
                'postal_code'           => $request->postal_code,
                'address'               => $request->address,
                'emergency_contact_name' => $request->emergency_contact_name,
                'emergency_contact_no'   => $request->emergency_contact_no,
                'hire_date'             => $request->hire_date,
                'retirement_date'       => $request->retirement_date,
                'guarantor_name'        => $request->guarantor_name,
                'guarantor_phone_no1'   => $request->guarantor_phone_no1,
                'guarantor_phone_no2'   => $request->guarantor_phone_no2,
                'guarantor_postal_code' => $request->guarantor_postal_code,
                'guarantor_address'     => $request->guarantor_address,
                'guarantor_relationship'=> $request->guarantor_relationship,
                'insurance_card_no'     => $request->insurance_card_no,
                'employee_key'          => $request->employee_key,
                'official_position'     => $request->official_position,
                'contract_code'         => $request->contract_code,
                'contract_type'         => $request->contract_type,
                'salary_type'           => $request->salary_type,
                'working_hours_per_day' => $request->working_hours_per_day,
                'note'                  => $request->note,
                'reason_for_retirement' => $request->reason_for_retirement,
                'created_datetime'      => $request->created_datetime,
                'modified_datetime'     => $request->modified_datetime,
            ]);

            $responseMessage = "EmployeeManagement Updated Successfully";

            return response()->json([
                'success' => true,
                'message' => $responseMessage,
                'data'    => $employeeInfo
            ],200);
        }else {
            $responseMessage = "Employee Data not Found";
            return response()->json([
                'success'   => false,
                'message'   => $responseMessage
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
