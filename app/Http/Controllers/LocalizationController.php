<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    public function index($locale)
    {
        App::setLocale($locale);
        $data['title'] = 'Localization';
        $data['lang_now'] = Session::get('languange');
        return view('localization.index', $data);
    }

    public function change(Request $request)
    {
        $lang = $request->input('languange');
        Session::put('languange', $lang);

        return redirect('/localization'.'/'.$lang);
    }
}
