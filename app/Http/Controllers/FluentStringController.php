<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FluentStringController extends Controller
{
    public function index()
    {
        echo '<h1>Fluent String</h1>';

        // Menampilkan string setelah after
        $slice = Str::of('Welcome to My Youtube Channel')->after('Welcome to');
        echo '1 - '.$slice.'<br>';

        // Menampilkan String terakhir setelah tanda \ (backslash)
        $slice2 = Str::of('App\Http\Controllers\AnwarController')->afterLast('\\');
        echo '2 - '.$slice2.'<br>';

        // Menambahkan string pada string sebelumnya
        $appended = Str::of('Hello')->append(' World');
        echo '3 - '.$appended.'<br>';

        // Membuat string huruf kecil
        $lower = Str::of('HALO Saya Anwar')->lower();
        echo '4 - '.$lower.'<br>';

        // Ubah / replace string dengan string lain
        $replaced = Str::of('Saya pakai Laravel 8.0')->replace('8.0', '9.0');
        echo '5 - '.$replaced.'<br>';

        // Setiap huruf awal jadi kapital
        $title = Str::of('this is a title')->title();
        echo '6 - '.$title.'<br>';

        // membuat slug
        $slug = Str::of('Laravel 9 Framework')->slug();
        echo '7 - '.$slug.'<br>';

        // Substring Kata/Kalimat
        $substr = Str::of('Laravel Framework')->substr(8, 5);
        echo '8 - '.$substr.'<br>';

        // Menghilangkan karakter tertentu
        $trim = Str::of('@Laravel Sip@')->trim('@');
        echo '9 - '.$trim.'<br>';

        // Membuat string huruf besar
        $upper = Str::of('laravel Mantap')->upper();
        echo '10 - '.$upper.'<br>';
    }
}
