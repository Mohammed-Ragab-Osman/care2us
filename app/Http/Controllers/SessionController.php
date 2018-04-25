<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
class SessionController extends Controller
{
	//front

    public function sessionStore()
    {
    	if(!auth()->attempt(request(['email', 'password'])))
    	{
    		return back()->with('loginerror', 'Email or password not correct !');
    	}

    	return redirect('checklogin');
    }

    public function destroy()
    {
    	auth()->logout();
    	return redirect('/');
    }


    //back
    // public function adminSessionStore()
    // {
    // 	if(!auth()->attempt(request(['email', 'password'])))
    // 	{
    // 		return back()->with('loginerror', 'Email or password not correct !');
    // 	}
    // 	return redirect('adminchecklogin');
    // }

    public function adminSessionStore()
    {
      //return request('password');
      if(!auth()->guard('admin')->attempt(request(['email', 'password'])))
      {
        return back()->with('loginerror', 'Email or password not correct !');
      }
      return redirect('adminchecklogin');
    }
}
