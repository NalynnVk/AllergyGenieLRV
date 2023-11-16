<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\MedicationReminderStoreRequest;
use App\Http\Resources\v1\MedicationReminderResource;
use App\Models\MedicationReminder;
use App\Traits\ApiPaginatorTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class MedicationReminderController extends Controller
{
    use ApiPaginatorTrait;

    public function index(Request $request)
    {
        $take = request()->get('take', 1000);
        $user = auth()->user();
        $data = $user->patient->medicationReminder()->paginate($take);
        // dd($data);
        // dd($insight);
        return $this->return_paginated_api(true, Response::HTTP_OK, null, MedicationReminderResource::collection($data), null, $this->apiPaginator($data));
    }

    public function show(MedicationReminder $medicationreminder)
    {
        $data = MedicationReminder::find($medicationreminder->id);
        return $this->return_api(true, Response::HTTP_OK, null, new MedicationReminderResource($data), null, null);
    }

    public function store(MedicationReminderStoreRequest $request)
    {
        $validated = $request->validated();

        // if ($request->hasFile('photo_path')){
        //     $photoPath = $request->file('photo_path')->store('', 'medicationreminder');
        //     $validated['photo_path'] = $photoPath;
        // }
        //TODO
        $validated['medication_id'] = $validated['medication']['id'];

        $medicationreminder = Auth::user()->patient->medicationReminders()->create($validated);

        return $this->return_api(true, Response::HTTP_CREATED, null, null, null);
    }

    public function update()
    {
    }
}
