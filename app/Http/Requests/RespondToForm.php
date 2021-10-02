<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RespondToForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            //
        ];

        foreach($this->request->get('responses') as $index => $response){
            if($response['question']['required'])
                $rules['responses.' . $index . '.value'] = "required";
        }

        return $rules;
    }
}
