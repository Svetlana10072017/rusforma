<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'code' => 'required|min:3|max:255|unique:products,code',//уникальное поле
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:5',
            'price' => 'required|numeric|min:1'
        ];

        if ($this->route()->named('products.update')) { //для проверки уникальности поля
            //(чтобы не добавлялся продукт с одинаковым именем), для маршрута update оно не нужно
            //если у нас update? то вводим парметр id продукта, для которого не нужно проводить проверку
            $rules['code'] .= ',' . $this->route()->parameter('product')->id;
        }

        return $rules;



    }
    public function messages()
    {  //добавляем свои описания ошибок
        return [
            'required' => 'Поле :attribute обязательно для заполнения',
            'min' => 'Поле :attribute должно иметь минимум :min символов',
            'code.min' => 'Поле код должно содержать не менее :min символов',
        ];
    }
}
