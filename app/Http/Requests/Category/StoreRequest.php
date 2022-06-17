<?php

// THIS FILE DEFINES THE VALIDATIONS FOR REGISTERS AND UPDATES

namespace App\Http\Requests\Category;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

// IMPORT NEEDED TO CREATE A FRIENDLY URL IN prepareForValidation FUNCTION

class StoreRequest extends FormRequest
{

    // THIS FUNCTION IS EXECUTED BEFORE THE BELOW VALIDATION
    protected function prepareForValidation()
    {
        // $this REFERENCES THE SENT REQUEST FROM A FORM
        $this->merge([
            'slug' => str($this->title)->slug()
        ]);
    }


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // BY DEFAULT IS FALSE. CHANGE TO TRUE
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // img IS NOT HERE BECAUSE IT WILL BE ADDED IN THE EDIT METHOD
            "title" => "required|min:5|max:500",
            "slug" => "required|min:5|max:500|unique:posts"
        ];
    }


    // Validator IS IMPORTED ABOVE
    function failedValidation(Validator $validator)
    {
        if($this->expectsJson()) {
            $response = new Response($validator->errors(), 422);
            // SHOWING EXCEPTION IN CASE
            throw new ValidationException($validator, $response);
        }
    }
}
