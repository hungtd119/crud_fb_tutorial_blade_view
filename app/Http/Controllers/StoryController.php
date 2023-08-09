<?php

namespace App\Http\Controllers;

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
    public function delete ($id){
        $deletedStory = $this->storyRepository->deleteStory($id);
        if ($deletedStory['success'])
            return \response($deletedStory,200);
        return \response($deletedStory,404);
    }
    public function create(StoreStoryRequest $request){
        $creatdStory = $this->storyRepository->createStory($request);
        if ($creatdStory['success'])
            return \response($creatdStory,200);
        return \response($creatdStory,404);
    }
    public function update (StoreStoryRequest $request){
        $updatedStory = $this->storyRepository->updateStory($request);
        if ($updatedStory['success'])
            return \response($updatedStory,200);
        return \response($updatedStory,404);
    }
}
