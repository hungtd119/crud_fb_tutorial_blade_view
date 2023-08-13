<?php

namespace App\Repositories\Page;

use App\Exceptions\ErrorException;
use App\Http\Requests\PageStoreRequest;
use App\Models\Page;
use App\Repositories\Helper\HelperInterface;
use Faker\Core\File;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class PageRepository implements PageInterface
{
    protected $helperRepository;
    public function __construct(HelperInterface $helperRepository)
    {
        $this->helperRepository = $helperRepository;
    }
    public function getAllPage()
    {
        // TODO: Implement getAllPage() method.
        try {
            $pages = Page::with('image','texts.audio','texts.position','texts.position','interactions.positions','interactions.image','interactions.text')->get();
            Log::info('Get all page');
            return $pages;
        }
        catch (QueryException $exception){
            throw ErrorException::queryFailed($exception->getMessage());
        }
    }

    public function deletePage($id)
    {
        // TODO: Implement deletePage() method.
        try {
            $page = Page::find($id);
            if (!$page)
                throw ErrorException::notFound('Page not found with id '.$id);
            $page->delete();
            Log::info('Deleted a page with id: '.$id);
            return true;
        }
        catch (QueryException $exception){
            throw ErrorException::queryFailed($exception->getMessage());
        }
    }

    public function createPage(PageStoreRequest $request)
    {
        // TODO: Implement createPage() method.
        try {
            $page = new Page();
            $page->id = $this->helperRepository->generateUniqueCode('Page');
            $page->image_id = $request->image_id;
            $page->page_number = $request->page_number;
            $page->story_id = $request->story_id;
            $page->save();
            Log::info('Created a page',[
                "page"=>$page
            ]);
            return [
                'success'=>true,
                'message'=>'create page successfully',
                'page'=>$page
            ];
        }
        catch (QueryException $exception){
            throw ErrorException::queryFailed($exception->getMessage());
        }
    }
    public function updatePage(PageStoreRequest $request)
    {
        // TODO: Implement updatePage() method.
        try {
            $page = Page::find($request->query('id'));
            if (!$page)
                throw ErrorException::notFound('Page not found with id '.$request->query('id'));
            $page->image_id = $request->input('image_id');
            $page->page_number = $request->input('page_number');
            $page->story_id = $request->input('story_id');
            $page->save();
            Log::info('Updated page with id: '. $request->query('id'));
            return $page;
        }
        catch (QueryException $exception){
            throw ErrorException::queryFailed($exception->getMessage());
        }
    }

    public function getPageById($id)
    {
        // TODO: Implement getPageById() method.
        try {
            $story= Page::with('image','texts.audio','texts.position','texts.position','interactions.positions','interactions.image','interactions.text')->find($id);
            if (!$story)
                throw ErrorException::notFound('Page not found with id '.$id);
            Log::info('Get page by id: '.$id);
            return $story;
        }catch (QueryException $exception){
            throw ErrorException::queryFailed($exception->getMessage());
        }
    }
}
