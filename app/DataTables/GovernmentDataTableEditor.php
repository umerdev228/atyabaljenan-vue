<?php

namespace App\DataTables;

use App\Government;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTablesEditor;

class GovernmentDataTableEditor extends DataTablesEditor
{
    protected $model = Government::class;

    /**
     * Get create action validation rules.
     *
     * @return array
     */
    public function createRules()
    {
        return [
//            'email' => 'required|email|unique:' . $this->resolveModel()->getTable(),
            'name'  => 'required',
            'name_ar'  => 'required',
            'delivery_charges'  => 'required',
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
            'name'  => 'sometimes|required',
            'name_ar'  => 'sometimes|required',
            'delivery_charges'  => 'sometimes|required|numeric',
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
