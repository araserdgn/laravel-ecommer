<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required',
        ];
    }

    public function messages(): array //! vALİDE EDİLEN YERLERİ TÜRKÇEYE CEVİRDİK. MESAJLAR IBELİRLEDK
    {
        return [
            'name.required'=>"İsim ve Soyisim Zorunludur.",
            'name.string'=>"İsim ve soyisim karakterlerden oluşmalıdır.",
            'name.min'=>"İsim ve soyisim minimum 3 karakterden olmalıdır.",
            'email.required'=>"Email Adresi zorundasınız.",
            'email.email' =>"Geçersiz bir Email girdiniz.",
            'subject.required'=>"Konu alanı doldurmak zorunludur.",
            'message.required'=>"Mesaj alanı zorunludur"
        ];
    }
}
