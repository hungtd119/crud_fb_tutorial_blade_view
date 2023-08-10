<?php

namespace App\Repositories\Text;

use App\Http\Requests\TextStoreRequest;
use http\Env\Request;

interface TextInterface
{
    public function getAllTexts();
    public function getTextById($id);
    public function createText(TextStoreRequest $request);
    public function updateText(TextStoreRequest $request);
    public function deleteText($id);
}
