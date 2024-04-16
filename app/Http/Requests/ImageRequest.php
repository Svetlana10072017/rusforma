<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [

            'image' => 'max:2048',

        ];
        if ($this->route()->named('imades.update')) { //для проверки уникальности поля
            //(чтобы не добавлялся продукт с одинаковым именем), для маршрута update оно не нужно
            //если у нас update? то вводим парметр id продукта, для которого не нужно проводить проверку
            $this->route()->parameter('image')->id;
        }



        return $rules;



    }
    public function messages()
    {  //добавляем свои описания ошибок
        return [

            'image.max'=>'Файл не должен превышать 2mb',

        ];
    }
}
