<?php

namespace App\DataTables;

use App\Addon;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTablesEditor;

class AddonDataTableEditor extends DataTablesEditor
{
    protected $model = Addon::class;

    /**
     * Get create action validation rules.
     *
     * @return array
     */
    public function createRules()
    {
        return [
//            'email' => 'required|email|unique:' . $this->resolveModel()->getTable(),
            'head_id'  => 'required',
            'name'  => 'required',
            'name_ar'  => 'required',
            'price'  => 'required|numeric',
            'stock'  => 'required|numeric',
            'manage_stock'  => 'required',
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
            'head_id'  => 'sometimes|required',
            'name'  => 'sometimes|required',
            'name_ar'  => 'sometimes|required',
            'price'  => 'sometimes|required|numeric',
            'stock'  => 'sometimes|required|numeric',
            'manage_stock'  => 'sometimes|required',
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
