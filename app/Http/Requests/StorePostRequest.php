<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
    * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>

    //  * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            //
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ];
    }
}
