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
            $story = $this->storyRepository->getStoryById($id);
            return \response([
                'success'=>true,
                'message'=>'find story by id',
                'data'=>$story
            ]);
    }
    public function delete ($id){

        $deletedStory = $this->storyRepository->deleteStory($id);
        return \response([
            'success'=>true,
            'message'=>'deleted story'
        ]);

    }
    public function create(StoreStoryRequest $request){
        $createdStory = $this->storyRepository->createStory(
            $request->input('title'),
            $request->input('image_id'),
            $request->input('author'),
            $request->input('illustrator'),
            $request->input('level'),
            $request->input('coin')
        );
        return \response([
            'success'=>true,
            'message'=> 'Created a new Story',
            'data'=>$createdStory
        ]);
    }
    public function update (StoreStoryRequest $request){
        $updatedStory = $this->storyRepository->updateStory(
            $request->query('id'),
            $request->input('title'),
            $request->input('image_id'),
            $request->input('author'),
            $request->input('illustrator'),
            $request->input('level'),
            $request->input('coin')
        );
        return \response([
            'success'=>true,
            'message'=>'updated story',
            'data'=>$updatedStory
        ],200);
    }
}
