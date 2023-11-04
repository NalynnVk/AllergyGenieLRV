<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\AllergenResource;
use App\Models\Allergen;
use App\Traits\ApiPaginatorTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AllergenController extends Controller
{
    use ApiPaginatorTrait;

    public function index()
    {
        $take = request()->get('take',1000);
        //Starting the 'index' method for displaying insights. Setting a default value of 1000 for 'take' parameter.

        $allergen = Allergen::paginate($take);
        //Fetching and paginating insights from the database based on the 'take' parameter.

        return $this->return_paginated_api(true, Response::HTTP_OK, null, AllergenResource::collection($allergen), null, $this->apiPaginator($allergen));
        //Returning a paginated API response with a success indicator, HTTP status code, insight data, and pagination information.
    }

}