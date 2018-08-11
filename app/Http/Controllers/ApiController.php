<?php

namespace App\Http\Controllers;

use App\Http\Resources\StandardsCollection;
use App\Standard;

class ApiController extends Controller
{
    public function standards()
    {
        return StandardsCollection::collection(Standard::all());
    }
}
