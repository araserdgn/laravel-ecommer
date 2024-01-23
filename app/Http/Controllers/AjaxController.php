<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function iletisimkaydet(Request $request) { //! POST alınan verileri yakalayabilmek için Request
        $data = $request->all(); // Bladedeki bütün verileri tutuyor, alter. olarak tek tek de alabilirsin
        // $x = [
        //     'name'->$request->name
        //      database -> blade isim
        // ]
        $data['ip'] = request()->ip();

        $sonveri = Contact::create($data);
        return back()->withSuccess('Başarıyla Gönderildi');
    }
}
