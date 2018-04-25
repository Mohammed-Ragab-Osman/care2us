<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Client;
use App\Pharmacist;
use App\Pharmacy;
use App\Firm;
use Mail;
use DB;
use App\Country;
use App\Governorate;
use App\City;

class RegistrationController extends Controller
{
    public function clientRegister()
    {
        $countries = DB::table('countries')->get();
        $governorates = DB::table('governorates')->get();
        $cities = DB::table('cities')->get();
        $client_types = DB::table('client_types')->get();
        $doc_types = DB::table('doc_type')->get();
        return view('front.pages.client_register')
            ->with('countries', $countries)
            ->with('governorates', $governorates)
            ->with('cities', $cities)
            ->with('client_types', $client_types)
            ->with('doc_types', $doc_types);
    }

    public function pharmacyRegister()
    {
        $countries = DB::table('countries')->get();
        $governorates = DB::table('governorates')->get();
        $cities = DB::table('cities')->get();
        return view('front.pages.pharmacy_register')
            ->with('countries', $countries)
            ->with('governorates', $governorates)
            ->with('cities', $cities);
    }

    public function firmRegister()
    {
        $countries = DB::table('countries')->get();
        $governorates = DB::table('governorates')->get();
        $cities = DB::table('cities')->get();
        $f_types = DB::table('firm_types')->get();
        return view('front.pages.firm_register')
            ->with('countries', $countries)
            ->with('governorates', $governorates)
            ->with('cities', $cities)
            ->with('f_types', $f_types);
    }


    public function userStore(Request $request)
    {
        $this->validate(request(), [
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);
        // Register
        $user = new User;

        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->mobile = $request->mobile;
        $user->u_type = $request->u_type;
        $user->status = 1;
        $user->u_country = $request->country;
        $user->u_governorate = $request->governorate;
        $user->u_city = $request->city;
        $user->u_address = $request->address;
        $user->password = bcrypt($request->password);
        $confirmation_code = str_random(30);
        $user->confirmation_code = $confirmation_code;
        $user->confirmed = 0;


        // if($user->save())
        // {
        // 	$verify = array(
        //        'to' => $request->email,
        //        'from' => 'info@pharmacy.com',
        //        'subject' => 'Verify your email address',
        //        'confirmation_code' => $confirmation_code
        //        );
        //     Mail::send('emails.verify', $verify, function($message) use ($verify)
        //     {
        //         $message->to($verify['to']);
        //         $message->subject($verify['subject']);
        //         $message->from($verify['from']);
        //     });
        // }

        if ($request->u_type == 3) {
            $client = new Client();
            $user->client_type=$request->client_type;
            if ($request->client_type != 1){
                $this->validate(request(), [
                    'home_clinc' => 'required'
                ]);
                $client->home_clinc = $request->home_clinc;
            }else{
                $client->home_clinc =0;
            }
            if ($request->home_clinc == 1 && $request->client_type == 3 ) {
                $this->validate(request(), [
                    'doc_type' => 'required'
                ]);
                $client->doc_type = $request->doc_type;
            }
            else{
                $client->doc_type=0;
            }
            ///// 5-4 updated by HW////////////////////
            $client->c_fname= $request->username;
            //////////////////
            $client->client_type = $request->client_type;
            $user->save();
            $client->user_id = $user->id;
            $client->save();
            return redirect('/login')->with('success', ' تم التسجيل بنجاح  , برجاء فحص البريد الالكترونى لتفعيل الحساب !');
        } elseif ($request->u_type == 4) {
            $pharmacy = new Pharmacy();

            $pharmacy->user_id = $user->id;
            $pharmacy->pharm_name = $request->name;

            $pharmacy->save();
            //redirect
            return redirect('/login')->with('success', 'تم التسجيل بنجاح  , برجاء فحص البريد الالكترونى لتفعيل الحساب !');
        } elseif ($request->u_type == 5) {
            $firm = new Firm();

            $firm->user_id = $user->id;
            $firm->f_name = $request->name;
            $firm->f_type = $request->firm_type;

            $firm->save();
            //redirect
            return redirect('/login')->with('success', 'تم التسجيل بنجاح  , برجاء فحص البريد الالكترونى لتفعيل الحساب !');
        }

    }

    public function confirm($confirmation_code)
    {
        if (!$confirmation_code) {
            throw new InvalidConfirmationCodeException;
        }

        $user = User::whereConfirmationCode($confirmation_code)->first();

        if (!$user) {
            throw new InvalidConfirmationCodeException;
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();

        return redirect('/login')->with('success', 'Your account is verified successfully !');
    }
}
