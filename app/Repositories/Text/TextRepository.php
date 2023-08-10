<?php

namespace App\Repositories\Text;

use App\Exceptions\ErrorException;
use App\Http\Requests\TextStoreRequest;
use App\Models\Text;
use App\Repositories\Helper\HelperInterface;
use http\Env\Request;
use Illuminate\Database\QueryException;

class TextRepository implements TextInterface
{
    protected $helperRepository;
    public function __construct(HelperInterface $helperRepository)
    {
        $this->helperRepository = $helperRepository;
    }
    public function getAllTexts()
    {
        // TODO: Implement getAllTexts() method.
        try {
            $texts = Text::with('audio')->get();
            return $texts;
        }
        catch (QueryException $exception){
            throw ErrorException::queryFailed($exception);
        }
    }

    public function getTextById($id)
    {
        // TODO: Implement getTextById() method.
        try {
            $text = Text::with('audio')->find($id);
            if (!$text)
                throw ErrorException::notFound('Text not found with id '.$id);
            return $text;
        }catch (QueryException $exception){
            throw ErrorException::queryFailed($exception);
        }
    }

    public function createText(TextStoreRequest $request)
    {
        // TODO: Implement createText() method.
        try {
            $text = new Text();
            $text->id = $this->helperRepository->generateUniqueCode('Text');
            $text->text = $request->input('text');
            $text->icon = $request->input('icon');
            $text->wordSync = $request->input('wordSync');

            $text->save();
            return $text;
        }catch (QueryException $exception){
            throw ErrorException::queryFailed($exception);
        }
    }

    public function updateText(TextStoreRequest $request)
    {
        // TODO: Implement updateText() method.
        try {
            $text = Text::find($request->query('id'));
            if (!$text)
                throw ErrorException::notFound('Text not found with id '.$request->query('id'));
            $text->text = $request->input('text');
            $text->icon = $request->input('icon');
            $text->wordSync = $request->input('wordSync');
            $text->save();
            return $text;
        }
        catch (QueryException $exception){
            throw ErrorException::queryFailed($exception->getMessage());
        }
    }

    public function deleteText($id)
    {
        // TODO: Implement deleteText() method.
        try {
            $text = Text::find($id);
            if (!$text)
                throw ErrorException::notFound('Text not found with id '.$id);
            $text->delete();
            return true;
        }catch (QueryException $exception){
            throw ErrorException::queryFailed($exception->getMessage());
        }
    }
}
