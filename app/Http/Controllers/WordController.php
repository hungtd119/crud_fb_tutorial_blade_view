<?php

namespace App\Http\Controllers;

use App\Http\Resources\DataCollection;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class WordController extends Controller
{
    public function index (){
        $words = Word::with('pages')->get();
        return new DataCollection($words);
    }
}
