<?php

namespace App\DataTables;

use App\Media;
use App\Product;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

use Spatie\Image\Image;
use Spatie\Image\Manipulations;
use Yajra\DataTables\DataTablesEditor;

class ProductDataTableEditor extends DataTablesEditor
{
    protected $model = Product::class;
    protected $actions = ['create', 'edit', 'remove', 'upload'];

    public $image = [];

    protected $uploadDir = '/storage/upload/';

    protected $imageWidth = 500;
    /**
     * Get create action validation rules.
     *
     * @return array
     */
    public function createRules()
    {
        return [
//            'email' => 'required|email|unique:' . $this->resolveModel()->getTable(),
            'category_id'  => 'required',
            'name'  => 'required',
            'name_ar'  => 'required',
            'price'  => 'required|numeric',
            'stock'  => 'required|numeric',
            'description'  => 'required',
            'description_ar'  => 'required',
            'display'  => 'required',
        ];
    }


    public function saving(Model $model, array $data)
    {

/*        $product = Product::create([
            'category_id' => $data['category_id'],
            'name_ar' => $data['name_ar'],
            'image' => $data['image'][0],
            'image-many-count' => $data['image-many-count'],
            'price_bd' => $data['price_bd'],
            'price_omr' => $data['price_omr'],
            'price_qar' => $data['price_qar'],
            'price_sar' => $data['price_sar'],
            'price_aed' => $data['price_aed'],
            'discount' => $data['discount'],
            'discount_percentage' => $data['discount_percentage'],
            'stock' => $data['stock'],
            'description' => $data['description'],
            'description_ar' => $data['description_ar'],
            'order_level' => $data['order_level'],
            'display' => $data['display'],
            'manage_stock' => $data['manage_stock'],
        ]);
        if (count($data['image']) > 0) {
            foreach ($data['image'] as $image) {
                Media::create([
                    'item_id' => $product->id,
                    'item_type' => 'product',
                    'path' => $image,
                ]);
            }
        }*/

        $data2 = [];
        foreach ($data as $key => $d) {
            if ($key !== 'media') {
                $data2[$key] = $d;
            }
            else {
                foreach ($d as $index => $media) {
                    if (is_array($media) && array_key_exists('path', $media)) {
                        $this->image[$index] = $media['path'];
                    }
                    else {
                        $this->image[$index] = $media;
                    }
                }
            }
        }
        $data = $data2;

        return $data;
    }

    public function saved(Model $model, array $data)
    {
        $result = Media::where('item_id', $model->id)->where('item_type', 'product')->delete();
        if ($this->image) {
            foreach ($this->image as $image) {
                $result = Media::create([
                    'item_id' => $model->id,
                    'item_type' => 'product',
                    'path' => $image,
                ]);
            }
        }
        return $model;
    }

    public function upload(Request $request)
    {
        try {
            $request->validate($this->uploadRules());

            $type = $request->input('uploadField');
            if ($type == 'image[]') {
                $type = 'image';
            }
            $dir  = $this->uploadDir . $type;

            $uploadedFile = $request->file('upload');
            $filename     = time() . '.png';

            $uploadedFile->move(public_path($dir), $filename);

            $method = 'optimize' . Str::title($type);
            if (method_exists($this, $method)) {
                $id = $this->{$method}($dir, $filename);
            } else {
                $id = $this->optimize($dir, $filename);
            }

            return response()->json([
                'data'   => [],
                'upload' => [
                    'id' => $id,
                ],
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'data'        => [],
                'fieldErrors' => [
                    [
                        'name'   => $request->get('uploadField'),
                        'status' => $exception->getMessage(),
                    ],
                ],
            ]);
        }
    }
    protected function optimize($dir, $filename)
    {
        $path = public_path($dir . '/' . $filename);

        Image::load($path)
            ->width($this->imageWidth)
            ->format(Manipulations::FORMAT_PNG)
            ->optimize()
            ->save();

        return $dir . '/' . $filename;
    }

    /**
     * Get edit action validation rules.
     *
     * @param Model $model
     * @return array
     */
    public function editRules(Model $model)
    {
        return [
//            'email' => 'sometimes|required|email|' . Rule::unique($model->getTable())->ignore($model->getKey()),

            'name_ar'  => 'sometimes|required',
            'price'  => 'sometimes|required|numeric',
            'stock'  => 'sometimes|required|numeric',
            'description'  => 'sometimes|required',
            'description_ar'  => 'sometimes|required',
            'display'  => 'sometimes|required',
        ];
    }

    /**
     * Get remove action validation rules.
     *
     * @param Model $model
     * @return array
     */
    public function removeRules(Model $model)
    {
        return [];
    }
}
