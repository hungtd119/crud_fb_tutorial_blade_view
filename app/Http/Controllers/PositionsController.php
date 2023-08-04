<?php

namespace App\Http\Controllers;

use App\Http\Resources\PositionResource;
use App\Http\Resources\PositionsCollection;
use App\Models\Positions;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PositionsController extends Controller
{
    public function index(){
        return new PositionsCollection(Positions::all());
    }
}
