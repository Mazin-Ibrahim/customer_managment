<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
       
        return [
            'name' => 'required',
            'phone' => 'required|unique:customers,phone,'.$this->input('customer_id'),
            'email' => 'required|email|unique:customers,email,'.$this->input('customer_id')
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'يجب أدخال اﻷسم',
            'email.required' => 'يجب أدخال البريد اﻷلكتروني',
            'email.email' => 'يجب أدخال البريد اﻷلكتروني بشكل صحيح',
            'email.unique' => 'البريد اﻷلكتروني مستخدم من قبل',
            'phone.required' => 'يجب أدخال رقم الهاتف',
            'phone.unique' => 'رقم الهاتف مستخدم من قبل'
        ];
    }
}
