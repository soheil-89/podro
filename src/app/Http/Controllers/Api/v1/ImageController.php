<?php


namespace App\Http\Controllers\Api\v1;


use App\Http\Requests\v1\ImageRequest;
use App\Http\Services\Uploader\Facades\UploaderFacades;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Response;

class ImageController extends Controller
{
    public function store(ImageRequest $request)
    {
        $input = $request->all();
        $model = Product::find($input["id"]);
        $image = Image::create([
            "url" => UploaderFacades::setFile($input["image"])->setDirectory($input["type"])->fileName()->store()
        ]);
        $image = $model->images()->save($image);

        return $this->response(["data" => $image]);
    }

    public function delete($id)
    {
        $image = Image::find($id);
        if($image)$image->delete();
        return $this->response(["message" => "its don!"],Response::HTTP_NO_CONTENT);
    }
}
