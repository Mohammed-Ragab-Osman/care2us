<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\AdminType;
use DB;
use Auth;
class AdminController extends Controller
{
  public function account()
   {
       return view('back.pages.admin.main');
   }
  public function adminRegister()
  {
      $countries = DB::table('countries')->get();
      $governorates = DB::table('governorates')->get();
      $cities = DB::table('cities')->get();
      return view('back.pages.admin.add_admin')
          ->with('countries', $countries)
          ->with('governorates', $governorates)
          ->with('cities', $cities);
  }
  public function storeAdmin(Request $request)
  {
    $this->validate(request(), [
        'username' => 'required|string|max:255|unique:users',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'phone' => 'required|string|max:255',
        'address' => 'required|string|max:255',
    ]);

    $user = new User;
    $user->username = $request->username;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->mobile = $request->mobile;
    // $user->u_type = $request->u_type;
    $user->status = 1;
    $user->u_country = $request->country;
    $user->u_governorate = $request->governorate;
    $user->u_city = $request->city;
    $user->u_address = $request->address;
    $user->password = bcrypt($request->password);
    $confirmation_code = str_random(30);
    $user->confirmation_code = $confirmation_code;
    $user->confirmed = 0;

    $admin = new AdminType;

    $admin->website_admin= $request->website_admin;
    $admin->ads_admin= $request->ads_admin;
    $admin->phramacy_admin= $request->phramacy_admin;
    $admin->firm_admin= $request->firm_admin;
    $admin->superadmin= $request->superadmin;
    if($request->superadmin!= null)
    {
      $user->u_type = 1;
}
    else{
        $user->u_type = 2;
          }
    $admin->save();

    $user->save();

  }

    public function aboutUsSetting()
    {
        $about = DB::table('abouts')->orderBy('created_at', 'desc')->first();
        return view('back.pages.admin.about_us_setting')->with('about', $about);

    }

    public function storeabout(Request $request)
    {
        $about = new About();
        $about->admin_id = Auth::user()->id;
        $about->about_text = $request->about_desc;
        $about->save();
        return redirect('/about-us-setting')->with('success', 'Done Add About');
    }


    public function updateabout(Request $request, $id)
    {



        DB::table('abouts')->where('id', $id)->update(array(
            'admin_id' => Auth::user()->id,
            'about_text' => $request->about_desc
        ));
        return redirect('/about-us-setting')->with('success', 'Done Updated About');
    }
   public function contactUsSetting()
   {
   		return view('back.pages.admin.contact_us_setting');
   }

   public function messages()
   {
   		return view('back.pages.admin.messages');
   }

   public function SocialLinksSetting()
   {
   		$facebook = DB::table('social_links')->where('id', 1)->first(['title','link']);
   		$twitter = DB::table('social_links')->where('id', 2)->first(['title','link']);
   		$linkedin = DB::table('social_links')->where('id', 3)->first(['title','link']);
   		$google_plus = DB::table('social_links')->where('id', 4)->first(['title','link']);
   		return view('back.pages.admin.social_media')
   		->with('facebook', $facebook)
   		->with('twitter', $twitter)
   		->with('linkedin', $linkedin)
   		->with('google_plus', $google_plus);
   }

   public function SocialLinksEdit(Request $request)
   {
   		if($request->facebook != '')
    	{
    		DB::table('social_links')->where('id', 1)->update(array(
    		'link' => $request->facebook
    		));
    	}
    	if($request->twitter != '')
    	{
    		DB::table('social_links')->where('id', 2)->update(array(
    		'link' => $request->twitter
    		));
    	}
    	if($request->linkedin != '')
    	{
    		DB::table('social_links')->where('id', 3)->update(array(
    		'link' => $request->linkedin
    		));
    	}
    	if($request->google_plus != '')
    	{
    		DB::table('social_links')->where('id', 4)->update(array(
    		'link' => $request->google_plus
    		));
    	}

    	return redirect()->back()->with('success','Your data updated Successfully');

   }

}
