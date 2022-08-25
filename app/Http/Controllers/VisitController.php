<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVisitRequest;
use App\Http\Requests\UpdateVisitRequest;
use App\Models\Link;
use App\Models\Visit;
use Illuminate\Http\Response;

class VisitController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreVisitRequest $request
     * @return Response
     */
    public function store(StoreVisitRequest $request, Link $link)
    {
        //
    }
}
