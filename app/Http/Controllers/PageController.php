<?php

namespace App\Http\Controllers;

use App\Exceptions\PageNotFoundException;
use App\Http\Requests\PageStoreRequest;
use App\Http\Resources\DataCollection;
use App\Models\Page;
use App\Repositories\Page\PageInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PageController extends Controller
{
    public $pageRepository;
    public function __construct(PageInterface $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    public function index (){
        $page = $this->pageRepository->getAllPage();
        return response(new DataCollection($page),200);
    }
    public function findById($id){
        try {
            $page = $this->pageRepository->getPageById($id);
            return response([
                'success'=>true,
                'message'=>'find page by id',
                'data'=>$page
            ]);
        }catch (PageNotFoundException $exception){
            throw $exception;
        }
    }
    public function create (PageStoreRequest $request){
        $createdPage = $this->pageRepository->createPage($request);
        if ($createdPage['success'])
            return \response($createdPage,200);
        return \response($createdPage,404);
    }
    public function delete ($id){
        try {
            $deletedPage = $this->pageRepository->deletePage($id);
            return response([
                'success'=>true,
                'message'=>'deleted page',
            ]);
        }
        catch (PageNotFoundException $exception){
            throw $exception;
        }
    }
    public function update (PageStoreRequest $request){
        try {
            $updatedPage = $this->pageRepository->updatePage($request);
            return response([
                'success'=>true,
                'message'=>'updated page',
                'data'=>$updatedPage
            ]);
        }
        catch (PageNotFoundException $exception){
            throw $exception;
        }
    }
}
