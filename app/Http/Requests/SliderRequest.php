<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
    public function rules(): array //! ZORUNLU ALANLARIMIZ, VALİDE ETTİĞİMİZ YER BURASI
    {
        return [
            'name'=>'required|string|min:5',
            'content'=>'required',
        ];
    }

    public function messages(): array //! vALİDE EDİLEN YERLERİ TÜRKÇEYE CEVİRDİK. MESAJLAR IBELİRLEDK
    {
        return [
            'name.required'=>"Başlık zorunludur Zorunludur.",
            'name.string'=>"Başlık karakterlerden oluşmalıdır.",
            'name.min'=>"Başlık minimum 3 karakterden olmalıdır.",

            'content.required' => "içerik zorunludur."
        ];
    }
}
