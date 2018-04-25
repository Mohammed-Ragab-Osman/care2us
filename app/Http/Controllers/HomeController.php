<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
	public function __construct()
    {
    	$facebook = DB::table('social_links')->where('id', 1)->first(['title','link']);
   		$twitter = DB::table('social_links')->where('id', 2)->first(['title','link']);
   		$linkedin = DB::table('social_links')->where('id', 3)->first(['title','link']);
   		$google_plus = DB::table('social_links')->where('id', 4)->first(['title','link']);
   		return view('front.parts.header')
   		->with('facebook', $facebook)
   		->with('twitter', $twitter)
   		->with('linkedin', $linkedin)
   		->with('google_plus', $google_plus);
    }
   public function home()
   {
   		// $facebook = DB::table('social_links')->where('id', 1)->first(['title','link']);
   		// $twitter = DB::table('social_links')->where('id', 2)->first(['title','link']);
   		// $linkedin = DB::table('social_links')->where('id', 3)->first(['title','link']);
   		// $google_plus = DB::table('social_links')->where('id', 4)->first(['title','link']);
   		return view('front.pages.home');
   		// ->with('facebook', $facebook)
   		// ->with('twitter', $twitter)
   		// ->with('linkedin', $linkedin)
   		// ->with('google_plus', $google_plus);
   }
}
