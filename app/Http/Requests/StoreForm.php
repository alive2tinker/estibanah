<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreForm extends FormRequest
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
        // dd($this->request);
        return [
            'title' => "required",
            'description' => "required",
            'questions' => "required",
            'questions.*.text' => "required",
            'questions.*.answers' => "required_if:questions.*.type,multiple|required_if:questions.*.type,checkbox",
            'questions.*.conditions' => "required_if:question.*.hasConditions,true",
            'questions.*.conditions.*.foreignQuestion' => "required",
            'questions.*.conditions.*.operation' => "required",
            'questions.*.conditions.*.value' => "required_unless:questions.*.conditions.*.operation,notEmpty"
        ];
    }
}
