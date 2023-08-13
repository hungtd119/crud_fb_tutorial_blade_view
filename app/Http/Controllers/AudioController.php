<?php

namespace App\Http\Controllers;

use App\Http\Requests\AudioStoreRequest;
use App\Repositories\Audio\AudioInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AudioController extends Controller
{
    protected $audioRepository;
    public function __construct(AudioInterface $audioRepository)
    {
        $this->audioRepository = $audioRepository;
    }

    public function index (){
        $audios = $this->audioRepository->getAllAudios();
        return response([
            'success'=>true,
            'message'=>'get all audios',
            'data'=>$audios
        ]);
    }
    public function findById ($id){
        $audio = $this->audioRepository->getAudioById($id);
        return response([
            'success'=>true,
            'message'=>'Get audio by id',
            'data'=>$audio
        ]);
    }
    public function delete ($id){
        $deletedAudio = $this->audioRepository->deleteAudio($id);
        return response([
            'success'=>true,
            'message'=>'deleted audio with id '.$id,
        ]);
    }
    public function create (AudioStoreRequest $request){
        $audio = $this->audioRepository->createAudio(
            $request->input('filename'),
            $request->input('path'),
            $request->input('time'),
            $request->input('text_id'),
        );
        return response([
            'success'=>true,
            'message'=>'created audio',
            'data'=>$audio
        ]);
    }
    public function update (AudioStoreRequest $request){
        $updatedAudio = $this->audioRepository->updateAudio(
            $request->query('id'),
            $request->input('filename'),
            $request->input('path'),
            $request->input('time'),
            $request->input('text_id'),
        );
        return response([
            'success'=>true,
            'message'=>'updated audio',
            'data'=>$updatedAudio
        ]);
    }
}
