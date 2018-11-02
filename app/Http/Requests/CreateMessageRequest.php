<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMessageRequest extends FormRequest
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
            'message'=>['required','max:191','min:2']
        ];
    }

    public function messages()
    {
        return ['message.required'=>"Fuck You escribe algo",
         'message.max'=>"Demasiado Prro",
         'message.min'=>"Poco Prro"];
    }
}
