<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutusController extends Controller
{
   public function aboutus()
   {
   		return view('front.pages.aboutus');
   }
}
