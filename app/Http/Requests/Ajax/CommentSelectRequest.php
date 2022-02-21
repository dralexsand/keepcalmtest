<?php

namespace App\Http\Requests\Ajax;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CommentSelectRequest extends FormRequest
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
        return [
            'offset' => ['required', 'integer'],
            'post_id' => ['required', 'integer'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors()->messages()['data'][7];

        throw new HttpResponseException(
            response()->json([
                'status' => false,
                'errors' => $errors,
            ], 422)
        );
    }
}
