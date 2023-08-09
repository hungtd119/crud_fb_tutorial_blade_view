<?php

namespace App\Repositories\Story;

use App\Http\Requests\StoreStoryRequest;
use App\Http\Resources\DataCollection;
use App\Models\Story;

class StoryRepository implements StoryInterface
{

    public function getAllStories()
    {
        // TODO: Implement getAllStories() method.
        $stories = Story::with('image','pages.interactions.positions','pages.interactions.image','pages.image','pages.texts.audio','pages.texts.position')->get();
        return $stories;
    }

    public function deleteStory($id)
    {
        // TODO: Implement deleteStory() method.
        $story = Story::find($id);
        if ($story){
            $story->delete();
            return [
                'success'=>true,
                'message'=>'deleted story with id: '.$id
            ];
        }
        return [
        'success'=>false,
        'message'=>'story not found with id: '.$id
        ];
    }

    public function createStory(StoreStoryRequest $request)
    {
        // TODO: Implement createStory() method.
        $story = new Story();
        $story->id = $this->generateUniqueCode();
        $story->title = $request->title;
        $story-> image_id = $request->image_id;
        $story->author = $request->author;
        $story->illustrator = $request->illustrator;
        $story->level = $request->level;
        $story->coin = $request->coin;
        $story->save();
        return [
            "success"=>true,
            "message"=>"inserted story success",
            "data"=>$story
        ];
    }
    public function generateUniqueCode()
    {
        do {
            $code = random_int(100000, 999999);
        } while (Story::where("id", "=", $code)->first());

        return $code;
    }

    public function updateStory(StoreStoryRequest $request)
    {
        // TODO: Implement updateStory() method.
        $story = Story::find($request->query('id'));
        if ($story){
            $story->title = $request->input('title');
            $story->image_id = $request->input('image_id');
            $story->author = $request->input('author');
            $story->illustrator = $request->input('illustrator');
            $story->level = $request->input('level');
            $story->save();

            return [
                'success'=>true,
                'message'=>'Updated story with id : '.$story->id
            ];
        }
        return [
            'success'=>false,
            'message'=>'error update story',
        ];
    }
}
