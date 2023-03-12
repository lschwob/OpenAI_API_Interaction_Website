<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IaController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function ias_show()
    {
        return view('ias');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function mail_show()
    {
        return view('mail');
    }


}
