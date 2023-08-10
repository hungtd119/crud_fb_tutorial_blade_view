<?php

namespace App\Http\Controllers;

use App\Http\Requests\TextStoreRequest;
use App\Repositories\Text\TextInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class TextController extends Controller
{
    protected $textRepository;
    public function __construct(TextInterface $textRepository)
    {
        $this->textRepository = $textRepository;
    }

    public function index (){
        $texts = $this->textRepository->getAllTexts();
        return response([
            'success'=>true,
            'message'=>'find all texts',
            'data'=>$texts
        ],Response::HTTP_OK);
    }
    public function findById ($id) {
        $text = $this->textRepository->getTextById($id);
        return \response([
            'success'=>true,
            'message'=>'find text by id',
            'data'=>$text
        ],Response::HTTP_OK);
    }
    public function delete ($id) {
        $text = $this->textRepository->deleteText($id);
        return \response([
            'success'=>true,
            'message'=>'deleted text',
        ],Response::HTTP_OK);
    }
    public function update (TextStoreRequest $request) {
        $text = $this->textRepository->updateText($request);
        return \response([
            'success'=>true,
            'message'=>'updated text',
        ],Response::HTTP_OK);
    }
    public function create (TextStoreRequest $request) {
        $text = $this->textRepository->createText($request);
        return \response([
            'success'=>true,
            'message'=>'created text',
        ],Response::HTTP_OK);
    }
}
