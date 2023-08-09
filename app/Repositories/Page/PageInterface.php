<?php

namespace App\Repositories\Page;

use App\Http\Requests\PageStoreRequest;

interface PageInterface
{
    public function getAllPage ();
    public function deletePage ($id);
    public function createPage(PageStoreRequest $request);
    public function updatePage(PageStoreRequest $request);
}
