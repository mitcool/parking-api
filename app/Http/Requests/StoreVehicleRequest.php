<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            'plate_number' => 'required',
        ];
    }
}
