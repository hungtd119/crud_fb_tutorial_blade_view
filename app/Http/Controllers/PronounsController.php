<?php

namespace App\Http\Controllers;

use App\Http\Resources\DataCollection;
use App\Models\Pronoun;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PronounsController extends Controller
{
    public function index (){
        return new DataCollection(Pronoun::all());
    }
}
