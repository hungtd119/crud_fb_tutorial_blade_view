<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStoryRequest;
use App\Http\Resources\DataCollection;
use App\Models\Story;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class StoryController extends Controller
{
    public function index (){
        $stories = Story::with('pages.words','pages.interactions.positions','pages.interactions.pronouns')->get();
        return new DataCollection($stories);
    }
    public function delete ($id){
        $story = Story::find($id);
        if ($story){
            $story->delete();
            return [
                "success"=>true,
                "message"=>"Deleted successfully"
            ];
        }
        return [
            "success"=>false,
            "message"=>"Story not found"
        ];
    }
    public function create(StoreStoryRequest $request){
        $story = new Story();
        $story->id = $this->generateUniqueCode();
        $story->title = $request->title;
        $story-> image = $request->image;
        $story->author = $request->author;
        $story->illustrator = $request->illustrator;
        $story->level = $request->level;
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
    public function update (StoreStoryRequest $request){
        $story = Story::find($request->query('id'));
        if ($story){
            $story->title = $request->input('title');
            $story->image = $request->input('image');
            $story->author = $request->input('author');
            $story->illustrator = $request->input('illustrator');
            $story->level = $request->input('level');
            $story->save();

            return response([
                'success'=>true,
                'message'=>'Updated story with id : '.$story->id
            ],200);
        }
        return \response([
            'success'=>false,
            'message'=>'error update story',
        ]);
    }
}
