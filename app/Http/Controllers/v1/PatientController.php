<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\MyAllergicStoreRequest;
use App\Http\Resources\v1\MyAllergicResource;
use App\Models\AllergenPatient;
use App\Models\Patient;
use App\Traits\ApiPaginatorTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PatientController extends Controller
{
    use ApiPaginatorTrait;

    public function index()
    {
        $take = request()->get('take', 1000);

        $user = auth()->user();
        $data = $user->patient->allergens()->paginate($take);

        // dd($patient);
        return $this->return_paginated_api(true, Response::HTTP_OK, null, MyAllergicResource::collection($data), null, $this->apiPaginator($data));
    }

    public function store(MyAllergicStoreRequest $request){

        $user = auth()->user()->patient;
        $validated = $request->validated();

        $data = AllergenPatient::create([
            'patient_id' => $user->id,
            'allergen_id' => $validated['allergen_id'],
            'severity' => $validated['severity'],
        ]);

        return $this->return_api(true, Response::HTTP_CREATED, null, null, null);
    }
}
