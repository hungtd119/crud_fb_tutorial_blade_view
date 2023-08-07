<?php

namespace App\Http\Controllers;

use App\Http\Resources\PositionResource;
use App\Http\Resources\DataCollection;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PositionController extends Controller
{
    public function index(){
        return new DataCollection(Position::all());
    }
}
