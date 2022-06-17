<?php

// THIS FILE DEFINES THE VALIDATIONS FOR REGISTERS AND UPDATES

namespace App\Http\Requests\Post;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
// IMPORT NEEDED TO CREATE A FRIENDLY URL IN prepareForValidation FUNCTION
use Illuminate\Support\Str;

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


    // Validator IS IMPORTED ABOVE
    function failedValidation(Validator $validator)
    {
        if($this->expectsJson()) {
            $response = new Response($validator->errors(), 422);
            // SHOWING EXCEPTION IN CASE
            throw new ValidationException($validator, $response);
        }
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
            "slug" => "required|min:5|max:500|unique:posts,slug,".$this->route("post")->id,
            "content" => "required|min:5|max:500",
            "category_id" => "required|integer",
            "description" => "required|min:7",
            "posted" => "required",
            "image" => "mimes:jepg,jpg,png|max:10240",
        ];
    }
}
