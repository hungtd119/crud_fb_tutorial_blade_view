<?php

namespace App\Http\Controllers;

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
    public function create (PageStoreRequest $request){
        $createdPage = $this->pageRepository->createPage($request);
        if ($createdPage['success'])
            return \response($createdPage,200);
        return \response($createdPage,404);
    }
    public function delete ($id){
        $deletedPage = $this->pageRepository->deletePage($id);
        if ($deletedPage['success'])
            return response($deletedPage,200);
        return response($deletedPage,404);
    }
    public function update (PageStoreRequest $request){
        $updatedPage = $this->pageRepository->updatePage($request);
        if ($updatedPage['success'])
            return response($updatedPage,200);
        return response($updatedPage,404);
    }
}
