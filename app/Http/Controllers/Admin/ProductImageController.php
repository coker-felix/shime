<?php
namespace App\Http\Controllers\Admin;

use App\Traits\UploadAble;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Contracts\ProductContract;
use App\Http\Controllers\BaseController;

class ProductImageController extends BaseController
{
    use UploadAble;

    protected $productRepository;

    public function __construct(ProductContract $productRepository)
    {
        $this->productRepository = $productRepository;
    }


    public function upload(Request $request)
    {
        $product = $this->productRepository->findProductById($request->product_id);

        if ($request->has('image')) {

            $image = $this->uploadOne($request->image, 'products');

            $productImage = new ProductImage([
                'full'      =>  $image,
                'thumnail' => null,
            ]);

            $product->images()->save($productImage);
        }
        if (!$product) {
            return $this->responseRedirectBack('Error occurred while uploading product image.', 'error', true, true);
        }
        return $this->responseRedirect('admin.products.index', 'Images added successfully' ,'success',false, false);
    }

    public function delete($id)
    {
        $image = ProductImage::findOrFail($id);

        if ($image->full != '') {
            $this->deleteOne($image->full);
        }
        $image->delete();

        return redirect()->back();
    }

}