<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\EmergencyContactStoreRequest;
use App\Http\Resources\v1\EmergencyContactResource;
use App\Models\EmergencyContact;
use App\Traits\ApiPaginatorTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class EmergencyContactController extends Controller
{
    use ApiPaginatorTrait;

    public function index()
    {
        $take = request()->get('take', 1000);
        //Starting the 'index' method for displaying insights. Setting a default value of 1000 for 'take' parameter.

        $emergencycontact = EmergencyContact::paginate($take);
        //Fetching and paginating insights from the database based on the 'take' parameter.

        return $this->return_paginated_api(true, Response::HTTP_OK, null, EmergencyContactResource::collection($emergencycontact), null, $this->apiPaginator($emergencycontact));
        //Returning a paginated API response with a success indicator, HTTP status code, insight data, and pagination information.
    }

    public function show(EmergencyContact $emergencycontact)
    {
        $data = EmergencyContact::find($emergencycontact->id);
        return $this->return_api(true, Response::HTTP_OK, null, new EmergencyContactResource($data), null, null);
    }

    public function store(EmergencyContactStoreRequest $request)
    {
        $validated = $request->validated();


        // if ($request->hasFile('photo_path')){
        //     $photoPath = $request->file('photo_path')->store('', 'emergencycontact');
        //     $validated['photo_path'] = $photoPath;
        // }

        // $validated['user_id'] = $validated['users']['id'];

        $emergencycontact = Auth::user()->patient->emergencyContact()->create($validated);
        // $data = new EmergencyContact();
        // $data = $data->create($validated);
        return $this->return_api(true, Response::HTTP_CREATED, null, null, null);
    }

    public function update()
    {
    }
}
