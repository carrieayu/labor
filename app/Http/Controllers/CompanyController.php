<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\t_company;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return t_company::all();
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
        $companyInfo = t_company::find($id);

        if($companyInfo){
            $data = $request->all();
            $validator = Validator::make($data, [
                'name'              => 'string',
                'service_person'    => 'string',
                'phone_no1'         => 'string',
                'phone_no2'         => 'string',
                'postal_code'       => 'string',
                'address'           => 'string',
                'note'              => 'string',
            ]);

            if($validator->fails()){
                return response(['error' => $validator->errors(), 'Validation Error']);
            }

            $companyInfo->update([
                'name'              => $request->name,
                'service_person'    => $request->service_person,
                'phone_no1'         => $request->phone_no1,
                'phone_no2'         => $request->phone_no2,
                'postal_code'       => $request->postal_code,
                'address'           => $request->address,
                'note'              => $request->note,
                'modified_datetime' => Carbon::now('Asia/Manila'),
            ]);

            $responseMessage = "Company Info Updated";

            return response()->json([
                'success'   => true,
                'message'   => $responseMessage,
                'data'      => $companyInfo
            ],200);


        }else {
            $responseMessage = "Company Info Not Found";
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
