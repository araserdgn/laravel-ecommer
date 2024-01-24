<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AjaxController extends Controller
{
    public function iletisimkaydet(ContactFormRequest $request) { //! POST alınan verileri yakalayabilmek için Request
                                                        // Kendi requestimizden alıyoruz biz ama
        // $data = $request->all(); // Bladedeki bütün verileri tutuyor, alter. olarak tek tek de alabilirsin
        // $x = [
        //     'name'->$request->name
        //      database -> blade isim
        // ]

        // $data['ip'] = request()->ip();



        $newdata = [
            'name'=>Str::title($request->name),
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'ip'=>request()->ip(),
        ];

        $sonveri = Contact::create($newdata);
        return back()->with(['message' => 'Başarılı Sekilde Gönderildi']);
    }
}
