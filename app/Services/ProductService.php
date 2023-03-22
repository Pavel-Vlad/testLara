<?php

namespace App\Services;

use Illuminate\Foundation\Http\FormRequest;

class ProductService
{
    public static function prepareAttrsForDB(FormRequest $request)
    {
        $attributes_from_request = [];

        if (isset($request->attr_name)) {
            $attributes_from_request = array_combine($request->attr_name, $request->attr_value);
        }

        return $attributes_from_request;
    }
}
