<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\PatientResource;
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

        $patient = Patient::paginate($take);

        $user = auth()->user();
        $data = $user->patient->paginate($take);

        // dd($patient);
        return $this->return_paginated_api(true, Response::HTTP_OK, null, PatientResource::collection($patient), null, $this->apiPaginator($patient));
    }
}
