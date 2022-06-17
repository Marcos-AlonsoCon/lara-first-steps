<?php

// THIS FILE DEFINES THE VALIDATIONS FOR UPDATES

namespace App\Http\Requests\Category;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

// IMPORT NEEDED TO CREATE A FRIENDLY URL IN prepareForValidation FUNCTION

class PutRequest extends FormRequest
{
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
            "title" => "required|min:5|max:500",
            // VERIFIES THAT THE GIVEN SLUG IS UNIQUE IN THE POSTS TABLE
            "slug" => "required|min:5|max:500|unique:categories,slug,".$this->route("category")->id
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
