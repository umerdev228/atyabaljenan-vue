<?php

namespace App\DataTables;

use App\Category;
use App\Product;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;
use Yajra\DataTables\DataTablesEditor;

class CategoryDataTableEditor extends DataTablesEditor
{

    protected $actions = ['create', 'edit', 'remove', 'upload'];

    protected $uploadDir = '/storage/upload/category';

    protected $imageWidth = 500;
    protected $model = Category::class;

    /**
     * Get create action validation rules.
     *
     * @return array
     */
    public function createRules()
    {
        return [
//            'email' => 'required|email|unique:' . $this->resolveModel()->getTable(),
            'category'  => 'required',
            'category_ar'  => 'required',
            'icon'  => 'required',

        ];
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
            'category'  => 'sometimes|required',
            'category_ar'  => 'sometimes|required',
            'icon'  => 'sometimes|required',
        ];
    }

    public function upload(Request $request)
    {
        try {
            $request->validate($this->uploadRules());

            $type = $request->input('uploadField');
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
