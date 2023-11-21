<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\AllergenStoreRequest;
use App\Http\Resources\v1\AllergenResource;
use App\Models\Allergen;
use App\Traits\ApiPaginatorTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AllergenController extends Controller
{
    use ApiPaginatorTrait;

    public function index()
    {
        $take = request()->get('take', 1000);
        //Starting the 'index' method for displaying insights. Setting a default value of 1000 for 'take' parameter.

        $allergen = Allergen::paginate($take);
        //Fetching and paginating insights from the database based on the 'take' parameter.

        return $this->return_paginated_api(true, Response::HTTP_OK, null, AllergenResource::collection($allergen), null, $this->apiPaginator($allergen));
        //Returning a paginated API response with a success indicator, HTTP status code, insight data, and pagination information.
    }

    public function show(Allergen $allergen)
    {
        $data = Allergen::find($allergen->id);
        return $this->return_api(true, Response::HTTP_OK, null, new AllergenResource($data), null, null);
    }

    public function store(AllergenStoreRequest $request)
    {
        $validated = $request->validated();

        // if ($request->hasFile('photo_path')){
        //     $photoPath = $request->file('photo_path')->store('', 'allergen');
        //     $validated['photo_path'] = $photoPath;
        // }

        // $validated['user_id'] = $validated['users']['id'];

        // $allergen = Auth::user()->allergens()->create($validated);
        $data = new Allergen;
        $data = $data->create($validated);
        return $this->return_api(true, Response::HTTP_CREATED, null, null, null);
    }

    public function update()
    {
    }
}
