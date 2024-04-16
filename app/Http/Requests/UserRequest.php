<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required|min:4|max:255|unique:users,email',//уникальное поле
            'name' => 'required|min:3|max:255',




        ];
        if ($this->route()->named('users.update')) {//для проверки уникальности поля
            //(чтобы не добавлялась категория с одинаковым именем), для маршрута update оно не нужно
            //если у нас update? то вводим парметр id категории, для которого не нужно проводить проверку
            $rules['email'] .= ',' . $this->route()->parameter('user')->id;
        }




        return $rules;
    }
    public function messages()
    {  //добавляем свои описания ошибок
        return [
            'required' => 'Поле :attribute обязательно для заполнения',
            'min' => 'Поле :attribute должно иметь минимум :min символов',
            'email.min' => 'Поле e-mail должно содержать не менее :min символов',
        ];
    }
}
