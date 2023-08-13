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

    public function index()
    {
        $page = $this->pageRepository->getAllPage();
        return response(new DataCollection($page), 200);
    }

    public function findById($id)
    {
        $page = $this->pageRepository->getPageById($id);
        return response([
            'success' => true,
            'message' => 'find page by id',
            'data' => $page
        ]);

    }

    public function create(PageStoreRequest $request)
    {
        $createdPage = $this->pageRepository->createPage(
            $request->input('image_id'),
            $request->input('page_number'),
            $request->input('story_id'),
        );
        return \response([
            'success' => true,
            'message' => 'Created a new Page',
            'data' => $createdPage
        ]);
    }

    public function delete($id)
    {
        $deletedPage = $this->pageRepository->deletePage($id);
        return response([
            'success' => true,
            'message' => 'deleted page',
        ]);

    }

    public function update(PageStoreRequest $request)
    {
        $updatedPage = $this->pageRepository->updatePage(
            $request->query('id'),
            $request->input('image_id'),
            $request->input('page_number'),
            $request->input('story_id'),
        );
        return response([
            'success' => true,
            'message' => 'updated page',
            'data' => $updatedPage
        ]);
    }
}
