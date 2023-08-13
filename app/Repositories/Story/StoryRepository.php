<?php

namespace App\Repositories\Story;

use App\Exceptions\ErrorException;
use App\Exceptions\StoryNotFoundException;
use App\Http\Requests\StoreStoryRequest;
use App\Http\Resources\DataCollection;
use App\Models\Story;
use App\Repositories\Helper\HelperInterface;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class StoryRepository implements StoryInterface
{
    protected $helperRepository;
    public function __construct(HelperInterface $helperRepository)
    {
        $this->helperRepository = $helperRepository;
    }

    public function getAllStories()
    {
        // TODO: Implement getAllStories() method.
        try {
            $stories = Story::with('image','pages.interactions.positions','pages.interactions.image','pages.image','pages.texts.audio','pages.texts.position')->get();
            Log::info('Get all stories');
            return $stories;
        }
        catch (QueryException $exception){
            throw ErrorException::queryFailed($exception->getMessage());
        }
    }

    public function deleteStory($id)
    {
        // TODO: Implement deleteStory() method.
        $story = Story::find($id);
        if (!$story){
            throw ErrorException::notFound('Story not exist with id : '.$id);
        }
        $story->delete();
        Log::info('Deleted story with id: '.$id);
        return true;
    }

    public function createStory(StoreStoryRequest $request)
    {
        // TODO: Implement createStory() method.
        try {
            $story = new Story();
            $story->id = $this->helperRepository->generateUniqueCode('Story');
            $story->title = $request->title;
            $story-> image_id = $request->image_id;
            $story->author = $request->author;
            $story->illustrator = $request->illustrator;
            $story->level = $request->level;
            $story->coin = $request->coin;
            $story->save();
            Log::info('Created a story',[
                'story'=>$story
            ]);
            return [
                "success"=>true,
                "message"=>"inserted story success",
                "data"=>$story
            ];
        }
        catch (QueryException $exception){
            throw ErrorException::queryFailed($exception->getMessage());
        }
    }

    public function updateStory(StoreStoryRequest $request)
    {
        // TODO: Implement updateStory() method.
        $story = Story::find($request->query('id'));
        if (!$story)
            throw ErrorException::notFound();
        $story->title = $request->input('title');
        $story->image_id = $request->input('image_id');
        $story->author = $request->input('author');
        $story->illustrator = $request->input('illustrator');
        $story->level = $request->input('level');
        $story->save();
        Log::info('Updated a story with id: '.$request->query('id'));
        return $story;
    }

    public function getStoryById($id)
    {
        // TODO: Implement getStoryById() method.
        $story= Story::with('image','pages.interactions.positions','pages.interactions.image','pages.interactions.text','pages.image','pages.texts.audio','pages.texts.position')->find($id);
        if (!$story)
            throw ErrorException::notFound('Story not found with id : '.$id);
        Log::info('Get story by id: '.$id);
        return $story;
    }
}
