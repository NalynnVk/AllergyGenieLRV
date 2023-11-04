<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\MedicationReminderResource;
use App\Models\MedicationReminder;
use App\Traits\ApiPaginatorTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
}
