<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\InsightResource;
use App\Models\Insight;
use App\Traits\ApiPaginatorTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InsightController extends Controller
{
    use ApiPaginatorTrait;

    public function index()
    {
        $take = request()->get('take', 1000);

        $insight = Insight::paginate($take);

        //$user = auth()->user();
        //$data = $user->patient->medications()->paginate($take);

        // dd($insight);
        return $this->return_paginated_api(true, Response::HTTP_OK, null, InsightResource::collection($insight), null, $this->apiPaginator($insight));
    }

    public function show(Insight $insight)
    {
        $data = Insight::find($insight->id);
        return $this->return_api(true, Response::HTTP_OK, null, new InsightResource($data), null, null);
    }
}
