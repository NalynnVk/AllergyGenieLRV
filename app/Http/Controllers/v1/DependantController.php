<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\DependantResource;
use App\Models\Dependant;
use App\Traits\ApiPaginatorTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DependantController extends Controller
{
    use ApiPaginatorTrait;

    public function index()
    {
        $take = request()->get('take', 1000);

        $dependant = Dependant::paginate($take);

        //$user = auth()->user();
        //$data = $user->patient->medications()->paginate($take);

        // dd($insight);
        return $this->return_paginated_api(true, Response::HTTP_OK, null, DependantResource::collection($dependant), null, $this->apiPaginator($dependant));
    }

    // public function index(Request $request)
    // {
    //     $take = request()->get('take', 1000);
    //     $user = auth()->user();
    //     $data = $user->patient->dependant()->paginate($take);
    //     // dd($data);
    //     // dd($insight);
    //     return $this->return_paginated_api(true, Response::HTTP_OK, null, DependantResource::collection($data), null, $this->apiPaginator($data));
    // }

    public function show(Dependant $dependant)
    {
        $data = Dependant::find($dependant->id);
        return $this->return_api(true, Response::HTTP_OK, null, new DependantResource($data), null, null);
    }
}
