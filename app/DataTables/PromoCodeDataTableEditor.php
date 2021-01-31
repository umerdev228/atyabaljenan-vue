<?php

namespace App\DataTables;

use App\PromoCode;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTablesEditor;

class PromoCodeDataTableEditor extends DataTablesEditor
{
    protected $model = PromoCode::class;

    /**
     * Get create action validation rules.
     *
     * @return array
     */
    public function createRules()
    {
        return [
//            'email' => 'required|email|unique:' . $this->resolveModel()->getTable(),
            'code'  => 'required|unique:promo_codes',
            'type'  => 'required',
            'description'  => 'required',
            'description_ar'  => 'required',
            'percentage'  => 'required',
            'amount'  => 'required',
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
//            'code' => 'sometimes|required' . Rule::unique($model->getTable())->ignore($model->getKey()),
            'code'  => 'sometimes|required|',
            'type'  => 'sometimes|required',
            'description'  => 'sometimes|required',
            'description_ar'  => 'sometimes|required',
            'percentage'  => 'sometimes|required',
            'amount'  => 'sometimes|required',
            'name'  => 'sometimes|required',
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
