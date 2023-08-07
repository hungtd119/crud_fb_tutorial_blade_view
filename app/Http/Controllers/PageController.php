<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageStoreRequest;
use App\Http\Resources\DataCollection;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PageController extends Controller
{
    public function index (){
        $pages = Page::with('stories','words','interactions.positions','interactions.pronouns')->get();
        return new DataCollection($pages);
    }
    public function create (PageStoreRequest $request){
        $page = new Page();
        $page->id = $this->generateUniqueCode();
        $page->image = $request->image;
        $page->sentence = $request->sentence;
        $page->audio = $request->audio;
        $page->page_number = $request->page_number;
        $page->story_id = $request->story_id;
        $page->save();
        return response([
            'success'=>true,
            'message'=>'create page successfully',
            'page'=>$page
        ]);
    }
    public function delete ($id){
        $page = Page::find($id);
        if ($page){
            $page->delete();
            return response([
                'success'=>true,
                'message'=>'delete page '. $id . ' successfully',
            ]);
        }
        return response([
            'success'=>false,
            'message'=>'page not found',
        ],404);
    }
    public function update (PageStoreRequest $request){
        $page = Page::find($request->query('id'));
        if ($page){
            $page->image = $request->input('image');
            $page->sentence = $request->input('sentence');
            $page->audio = $request->input('audio');
            $page->page_number = $request->input('page_number');
            $page->story_id = $request->input('story_id');

            $page->save();

            return response([
                'success'=>true,
                'message'=>'updated page with id '.$request->query('id').' successfully',
            ]);
        }
        return response([
            'success'=>false,
            'message'=>'page not found',
        ],404);
    }
    public function generateUniqueCode()
    {
        do {
            $code = random_int(100000, 999999);
        } while (Page::where("id", "=", $code)->first());

        return $code;
    }
}
