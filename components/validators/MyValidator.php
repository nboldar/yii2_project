<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 10.10.2018
 * Time: 21:40
 */

namespace app\components\validators;


use yii\validators\Validator;

class MyValidator extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        $attributeValue = $model->$attribute;
        if (!is_string($attributeValue)) {
            $this->addError($model, $attribute, 'Значения должны быть строкой');
        }
    }

}