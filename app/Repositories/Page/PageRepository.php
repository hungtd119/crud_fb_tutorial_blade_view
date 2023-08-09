<?php

namespace App\Repositories\Page;

use App\Http\Requests\PageStoreRequest;
use App\Models\Page;

class PageRepository implements PageInterface
{

    public function getAllPage()
    {
        // TODO: Implement getAllPage() method.
        $pages = Page::with('image','texts.audio','texts.position','texts.position','interactions.positions','interactions.image')->get();
        return $pages;
    }

    public function deletePage($id)
    {
        // TODO: Implement deletePage() method.
        $page = Page::find($id);
        if ($page){
            $page->delete();
            return [
                'success'=>true,
                'message'=>'delete page '. $id . ' successfully',
            ];
        }
        return [
            'success'=>false,
            'message'=>'page not found',
        ];
    }

    public function createPage(PageStoreRequest $request)
    {
        // TODO: Implement createPage() method.
        $page = new Page();
        $page->id = $this->generateUniqueCode();
        $page->image_id = $request->image_id;
        $page->page_number = $request->page_number;
        $page->story_id = $request->story_id;
        $page->save();
        return [
            'success'=>true,
            'message'=>'create page successfully',
            'page'=>$page
        ];
    }
    public function generateUniqueCode()
    {
        do {
            $code = random_int(100000, 999999);
        } while (Page::where("id", "=", $code)->first());

        return $code;
    }
    public function updatePage(PageStoreRequest $request)
    {
        // TODO: Implement updatePage() method.
        $page = Page::find($request->query('id'));
        if ($page){
            $page->image_id = $request->input('image_id');
            $page->page_number = $request->input('page_number');
            $page->story_id = $request->input('story_id');

            $page->save();

            return [
                'success'=>true,
                'message'=>'updated page with id '.$request->query('id').' successfully',
            ];
        }
        return [
            'success'=>false,
            'message'=>'page not found',
        ];
    }
}
