<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\TrackingStoreRequest;
use App\Http\Requests\v1\TrackingUpdateRequest;
use App\Http\Resources\v1\TrackingResource;
use App\Models\Tracking;
use App\Traits\ApiPaginatorTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TrackingController extends Controller
{
    use ApiPaginatorTrait;

    // public function index(Request $request)
    // {
    //     $take = request()->get('take', 1000);
    //     $user = auth()->user();
    //     $data = $user->patient->trackings()->paginate($take);
    //     dd($data);
    //     // dd($insight);
    //     return $this->return_paginated_api(true, Response::HTTP_OK, null, TrackingResource::collection($data), null, $this->apiPaginator($data));
    // }

    public function index()
    {
        $take = request()->get('take', 1000);

        $user = auth()->user();
        $data = $user->patient->trackings()->paginate($take);

        // dd($insight);
        return $this->return_paginated_api(true, Response::HTTP_OK, null, TrackingResource::collection($data), null, $this->apiPaginator($data));
    }

    public function show(Tracking $tracking)
    {
        $data = Tracking::find($tracking->id);
        return $this->return_api(true, Response::HTTP_OK, null, new TrackingResource($data), null, null);
    }

    public function store(TrackingStoreRequest $request)
    {
        $validated = $request->validated();

        // $medicationreminder = Auth::user()->medicationreminders()->create($validated);
        $validated['symptom_id'] = $validated['symptom']['id'];
        $validated['allergen_id'] = $validated['allergen']['id'];

        Auth::user()->patient->trackings()->create($validated);

        return $this->return_api(true, Response::HTTP_CREATED, null, null, null);
    }

    public function update(TrackingUpdateRequest $request,Tracking $tracking)
    {
        $validated=$request->validated();
        $id=Tracking::find($tracking->id);
        // dd($id);
        $tracking=$id->update($validated);

        return $this->return_api(true, Response::HTTP_CREATED, null, null, null);
    }
}
