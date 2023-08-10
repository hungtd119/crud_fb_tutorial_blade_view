<?php

namespace App\Http\Controllers;

use App\Exceptions\StoryNotFoundException;
use App\Http\Requests\StoreStoryRequest;
use App\Http\Resources\DataCollection;
use App\Models\Story;
use App\Repositories\Story\StoryInterface;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class StoryController extends Controller
{
    public $storyRepository;
    public function __construct(StoryInterface $storyRepository)
    {
        $this->storyRepository = $storyRepository;
    }

    public function index (){
        $stories = $this->storyRepository->getAllStories();
        return \response(new DataCollection($stories),200);
    }
    public function findById($id){
        try {
            $story = $this->storyRepository->getStoryById($id);
            return \response([
                'success'=>true,
                'message'=>'find story by id',
                'data'=>$story
            ]);
        }catch (StoryNotFoundException $exception){
            throw $exception;
        }
    }
    public function delete ($id){
        try {
            $deletedStory = $this->storyRepository->deleteStory($id);
            return \response([
                'success'=>true,
                'message'=>'deleted story'
            ]);
        }catch (StoryNotFoundException $exception){
            throw $exception;
        }
    }
    public function create(StoreStoryRequest $request){
        $creatdStory = $this->storyRepository->createStory($request);
        if ($creatdStory['success'])
            return \response($creatdStory,200);
        return \response($creatdStory,404);
    }
    public function update (StoreStoryRequest $request){
        try {
            $updatedStory = $this->storyRepository->updateStory($request);
            return \response([
                'success'=>true,
                'message'=>'updated story',
                'data'=>$updatedStory
            ],200);
        }catch (StoryNotFoundException $exception){
            throw new $exception;
        }
    }
}
