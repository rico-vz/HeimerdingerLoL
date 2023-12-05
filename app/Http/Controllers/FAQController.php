<?php

namespace App\Http\Controllers;

class FAQController extends Controller
{
    public function leagueoflegends()
    {
        return view('about.faq.leagueoflegends');
    }

    public function heimerdinger()
    {
        return view('about.faq.heimerdinger');
    }
}
