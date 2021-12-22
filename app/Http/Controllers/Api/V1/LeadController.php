<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Vinkla\Hashids\Facades\Hashids;

class LeadController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\V1\LeadRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validateRequest($request, 'store');
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Request with semantic errors',
                'error' => $validator->messages()
            ], 422);
        } 
        if (!Lead::where('email', '=', $request['email'])->exists()) {

            $lead = Lead::create([
                'firstname' => $request['firstname'],
                'lastname' => $request['lastname'],
                'email' => $request['email'],
                'companyname' => $request['companyname'],
                'website' => $request['website'],
                'phone' => $request['phone'],
                'suscribe' => $request['suscribe']
            ]);
    
            return response()->json([
                'message' => 'Lead created succesfully',
                'id' => Hashids::encode($lead->id)
            ], 201);

        } else {
            return response()->json([
                'message' => 'Already exists'
            ], 422);
        }
        return response()->json([
            'message' => 'Unauthorized'
        ], 401);
    }  

    public function checkLead($hash = null){
        $failRequest = true;
        if($hash != NULL || $hash != ''){
            $id = Hashids::decode($hash);
            if(Lead::where('id', '=', $id)->exists()){
                $lead = Lead::find($id)->first();
                return response()->json([
                    'message' => 'Authorized',
                    'hash' => $hash,
                    'get_resource' => $lead->get_resource
                ], 201);
            }
        } 
        if($failRequest){
            return response()->json([
                'message' => 'Unauthorized',
            ], 201);
        }
    }

    public function updateStatusGetResource($hash = null){
        $failRequest = true;
        if($hash != NULL || $hash != ''){
            $id = Hashids::decode($hash);
            if(Lead::where('id', '=', $id)->exists()){
                $lead = Lead::where('id', '=', $id)->first();
                $lead->get_resource = 1;
                $lead->save();
                return response()->json([
                    'message' => 'Updated',
                    'hash' => $hash,
                    'get_resource' => $lead->get_resource
                ], 201);
            }
        } 
        if($failRequest){
            return response()->json([
                'message' => 'Unauthorized',
            ], 201);
        }
    }

    public function validateRequest(Request $request, $method){
        if($method == 'store'){
            return Validator::make($request->all(), [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'website' => 'required',
                'companyname' => 'required',
                'suscribe' => 'required',
            ]);
        }
    }   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lead $lead)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lead $lead)
    {
        //
    }
}
