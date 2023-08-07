<?php

namespace App\Http\Controllers;

use App\Http\Resources\DataCollection;
use App\Models\Interaction;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class InteractionsController extends Controller
{
    public function index (){
        return new DataCollection(Interaction::all());
    }
}
