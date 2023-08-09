<?php

namespace App\Repositories\Story;

use App\Http\Requests\StoreStoryRequest;

interface StoryInterface
{
    public function getAllStories();
    public function deleteStory($id);

    public function createStory(StoreStoryRequest $request);
    public function updateStory(StoreStoryRequest $request);
}
