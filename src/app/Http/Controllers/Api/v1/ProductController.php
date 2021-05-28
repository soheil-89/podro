<?php


namespace App\Http\Controllers\Api\v1;


use App\Http\Requests\v1\ProductListRequest;
use App\Http\Requests\v1\ProductStoreRequest;
use App\Http\Resources\v1\ProductResource;
use App\Models\Product;
use Illuminate\Http\Response;

/**
 * Class ProductController
 * @package App\Http\Controllers\Api\v1
 */
class ProductController extends Controller
{
    /**
     * @param ProductListRequest $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(ProductListRequest $request)
    {
        $input = $request->only("title", "description", "status");
        $product = new Product();
        foreach ($input as $key => $val) {
            $product = $product->where($key, 'like', $val . "%");
        }
        return ProductResource::collection($product->paginate($this->pageCount));
    }

    /**
     * @param ProductStoreRequest $request
     * @return ProductResource
     */
    public function store(ProductStoreRequest $request)
    {
        return new ProductResource(Product::create($request->all()));
    }

    /**
     * @param ProductStoreRequest $request
     * @param $id
     * @return ProductResource
     */
    public function update(ProductStoreRequest $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return new ProductResource($product);
    }

    /**
     * @param $id
     * @return ProductResource
     */
    public function show($id)
    {
        return new ProductResource(Product::find($id));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return $this->response([], Response::HTTP_NO_CONTENT);
    }
}
