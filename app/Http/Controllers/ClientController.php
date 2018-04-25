<?php

namespace App\Http\Controllers;

use App\AskDoctorComments;
use App\HomeClinicComments;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Medical_file;
use App\Ask_doctor;
use App\Request_medicin;
use App\Home_clinic;
use DB;
use Auth;

use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
 ///////////////// client account//////////////
   public function account()
    {
        return view('back.pages.client.main');
    }

   public function accountSetting()
    {
        $countries = DB::table('countries')->get();
        $governorates = DB::table('governorates')->get();
        $cities = DB::table('cities')->get();
        $user = DB::table('users')->where('id', Auth::user()->id)->first();
        $client = DB::table('clients')->where('user_id', $user->id)->first();
        $client_types = DB::table('client_types')->get();
        return view('back.pages.client.account_setting')
            ->with('countries', $countries)
            ->with('governorates', $governorates)
            ->with('cities', $cities)
            ->with('user', $user)
            ->with('client', $client)
            ->with('client_types', $client_types);
    }

  public function updateClient($user_id, Request $request)
    {
        $this->validate(request(), [
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);
        DB::table('users')->where('id', $user_id)->update(array(

            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'mobile' => $request->mobile,
            'u_address' => $request->address,
            'u_country' => $request->country,
            'u_governorate' => $request->governorate,
            'u_city' => $request->city,
        ));
        DB::table('clients')->where('user_id', $user_id)->update(array(

            'client_type' => $request->client_type,
        ));
        return redirect()->back()->with('success', 'تم تعديل البيانات بنجاح');
    }
    //////////////////////// Ask Doctor////////////////////
  public function askDoctor()
    {
        $sicknessTypes = DB::table('sickness_types')->get();
        $doc_types=DB::table('doc_type')->get();
        return view('back.pages.client.ask_doctor')
            ->with('sicknessTypes', $sicknessTypes)
            ->with('doc_types',$doc_types);
    }

  public function storeAskDoctor(Request $request)
    {
        $Ask = new Ask_doctor;
        $this->validate(request(), ['username' => 'required|string|max:255',
            'doctor' => 'required|string',
            'sickness' => 'required|string',
            'email' => 'required|string|email|max:255',
            'details'=>'required']);
        $Ask->username = $request->username;
        $Ask->user_id = Auth::user()->id;
        $Ask->doctor_id = $request->doctor;
        $Ask->email = $request->email;
        $Ask->question = $request->sickness;
        $Ask->detials = $request->details;
        $Ask->doc_type_id=$request->doc_type;
        $Ask->save();

        return redirect('/ask-file')->with('success', 'لقد تم ارسال سؤالك بنجاح !!');
    }

  public function getMyAsk()
    {
       if(Auth::user()->client_type==1){
         $myask = DB::table('ask_doctors')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
         return view('back.pages.client.ask_file')->with('myask', $myask);
       }
       elseif(Auth::user()->client_type==3){
        $myask = DB::table('ask_doctors')->where('doctor_id', Auth::user()->id)->orderBy('id', 'desc')->get();
         return view('back.pages.client.medical_consultation')->with('myask', $myask);
       }

    }

  public function deleteAskDoctor($ask_id)
    {
        DB::table('ask_doctors')->where('id', $ask_id)->delete();
        return redirect('/ask-file')->with('success', 'لقد تم حذف السوال بنجاح !!');
    }

  public function modifyAskDoctor($ask_id)
    {
        $ask_doctor = DB::table('ask_doctors')->where('id', $ask_id)->first();
        $doc_types = DB::table('clients')->where('client_type', 3)->get();
        $sicknessTypes = DB::table('sickness_types')->get();
        return view('back.pages.client.ask_doctor')->with('ask_doctor', $ask_doctor)
          ->with('doc_types',$doc_types)
         ->with('sicknessTypes', $sicknessTypes);
    }

  public function editAskDoctor($ask_id, Request $request)
    {
        $this->validate(request(), ['username' => 'required|string|max:255',
            'doctor' => 'required|string',
            'sickness' => 'required|string',
            'email' => 'required|string|email|max:255']);
        DB::table('ask_doctors')->where('id', $ask_id)
            ->update(['username' => $request->username,
                'user_id' => Auth::user()->id,
                'doctor_id' => $request->doctor,
                'email' => $request->email,
                'question' => $request->sickness,
                'detials' => $request->details
            ]);
        return redirect('/ask-file')->with('success', 'تم تعديل العرض بنجاح');
    }

  Public function AskDoctorsDetails($ask_id)
    {
       $details= DB::table('ask_doctors')->where('ask_doctors.id',$ask_id)
         ->join('users', 'ask_doctors.doctor_id', '=', 'users.id')
         ->join('doc_type','ask_doctors.doc_type_id', '=', 'doc_type.id')
         ->select('ask_doctors.*', 'users.username as name', 'doc_type.doc_type')
         ->orderBy('ask_doctors.id', 'desc')
         ->first();
      $comments=DB::table('ask_doctor_comments')->where('ask_id',$ask_id)
               ->join('users', 'ask_doctor_comments.user_id', '=', 'users.id')
                ->select('ask_doctor_comments.*', 'users.username')
                ->get();
      return view ('back.pages.client.ask_doctor-details')
     ->with('details',$details)
      ->with('comments',$comments);
      }

  public function storeComment($ask_id ,Request $request)
     {
      $ask= new AskDoctorComments ;
      $this->validate(request(), ['comment' => 'required']);
      $ask->ask_id=$ask_id;
      $ask->user_id=Auth::user()->id;
      $ask->comment= $request->comment;
      if ($request->attach_file != '') {
          $attach_file = time() . '.' . $request->attach_file->getClientOriginalExtension();
          $ask->attach_file = $attach_file;
          $request->attach_file->move(public_path('images/comments'),$attach_file);
      }
      $ask->save();
       return redirect('/askDoctors-details/'.$ask_id);
     }
//////////HomeClinc///////////////
  public function getHomeClinic()
    {
       if(Auth::user()->client_type==4){
         $homeclinics = DB::table('home_clinics')->where('doctor_id', Auth::user()->id)
           ->join('users','home_clinics.user_id','=','users.id')
           ->select('home_clinics.*','users.username')
            ->orderBy('home_clinics.id', 'desc')
           ->get();
            return view('back.pages.client.home_clinic_file')->with('homeclinics', $homeclinics);

       }
       elseif(Auth::user()->client_type==3){
        $homeclinics = DB::table('home_clinics')->where('doctor_id', Auth::user()->id)
        ->join('users','home_clinics.user_id','=','users.id')
        ->select('home_clinics.*','users.username')
          ->orderBy('home_clinics.id', 'desc')
        ->get();
         return view('back.pages.client.home_clinic_file')->with('homeclinics', $homeclinics);
       }
       elseif(Auth::user()->client_type==1){
         $homeclinics = DB::table('home_clinics')->where('user_id', Auth::user()->id)
         ->join('users','home_clinics.doctor_id','=','users.id')
         ->select('home_clinics.*','users.username')
           ->orderBy('home_clinics.id', 'desc')
         ->get();
          return view('back.pages.client.home_clinic_file')->with('homeclinics', $homeclinics);
       }
    }

  public function homeclinicDetails($home_id)
    {
         if(Auth::user()->client_type==3){
           $details= DB::table('home_clinics')->where('home_clinics.id',$home_id)
               ->join('users', 'home_clinics.user_id', '=', 'users.id')
               ->join('clients','home_clinics.doctor_id', '=', 'clients.user_id')
               ->join('doc_type','home_clinics.doctor_type_id', '=', 'doc_type.id')
               ->select('home_clinics.*','users.username','doc_type.doc_type','clients.client_type','clients.c_fname')
               ->first();
         }
          elseif(Auth::user()->client_type==4)
          {
            $details= DB::table('home_clinics')->where('home_clinics.id',$home_id)
            ->join('users', 'home_clinics.user_id', '=', 'users.id')
            ->join('clients','home_clinics.doctor_id', '=', 'clients.user_id')
            ->select('home_clinics.*','users.username','clients.client_type','clients.c_fname')
            ->first();

          }
          elseif(Auth::user()->client_type==1){
            $details = DB::table('home_clinics')->where('home_clinics.id', $home_id)
            ->join('users', 'home_clinics.user_id', '=', 'users.id')
            ->join('clients','home_clinics.doctor_id', '=', 'clients.user_id')
            ->join('doc_type','home_clinics.doctor_type_id', '=', 'doc_type.id')
            ->select('home_clinics.*','users.username','doc_type.doc_type','clients.client_type','clients.c_fname')
            ->first();

          }

          $comments=DB::table('home_clinic_comments')->where('home_clinic_comments.home_clinic_id',$home_id)
          ->join('users', 'home_clinic_comments.user_id', '=', 'users.id')
          ->select('home_clinic_comments.*', 'users.username')
          ->get();

          return view ('back.pages.client.home_clinic_details')
          ->with('details',$details)
          ->with('comments',$comments);
    }

  public function storeCommentsClinic(Request $request)
   {
      $homeclinic= new HomeClinicComments ;
     $this->validate(request(), ['comment' => 'required']);
      $homeclinic->home_clinic_id=$request->id;
      $homeclinic->user_id=Auth::user()->id;
      $homeclinic->comment= $request->comment;
      if ($request->attach_file != '') {
          $attach_file = time() . '.' . $request->attach_file->getClientOriginalExtension();
          $homeclinic->attach_file = $attach_file;
          $request->attach_file->move(public_path('images/comments'),$attach_file);
      }
      $homeclinic->save();
     return redirect('/details-home-clinic/'.$request->id);
      }

  public function rejectHomeClinic($home_id)
   {
      DB::table('home_clinics')->where('id', $home_id)
        ->update(['status'=>'rejected']);
     return redirect('/details-home-clinic/'.$home_id);
     }

  public function acceptHomeClinic ($home_id)
   {
          DB::table('home_clinics')->where('id', $home_id)
        ->update(['status'=>'accept']);
        return redirect('/details-home-clinic/'.$home_id);
        }

  public function homeClinic()
   {
    return view("back.pages.client.home_clinic");
    }
//***** 17-4 HW*****////////
  public function deleteHomeClinic($home_id)
   {
     DB::table('home_clinics')->where('id', $home_id)->delete();
     return redirect('/home-clinic')->with('success',' لقد تم الحذف الطلب بنجاح!!');
   }
////**********************//////
  public function askHomeClinic()
   {
      $client_types = DB::table('client_types')->where('id', '!=', '1')->get();
      return view("back.pages.client.ask_home_clinic")
      ->with('client_types', $client_types);
    }

  public function gethomedoc(Request $request)
   {
     $data = DB::table('clients')->where('client_type', '=', $request->id)->get();
     return response()->json($data);
    }

  public function gethomedocscp(Request $request)
   {
     $data = DB::table('clients')->where('doc_type', '=', $request->id)->get();
     return response()->json($data);

   }

  public function gethomename(Request $request)
   {
    $data = DB::table('doc_type')->get();
    return response()->json($data);
   }

  public function storehomeclinic(Request $request)
   {
     $clinic = new Home_clinic;

     if ($request->doc_type == 3) {
        $this->validate(request(),
          [
              'phone' => 'required',
              'address' => 'required|string|max:255',
              'doc_type' => 'required',
              'doctor' => 'required',
              'doctorName' => 'required',

          ]);

         } else {
            $this->validate(request(),
              [
              'phone' => 'required',
              'address' => 'required|string|max:255',
              'doc_type' => 'required',
              'doctorName' => 'required',
              ]);
         }
     $clinic->user_id = Auth::user()->id;
     $clinic->doctor_id = $request->doctorName;
     $clinic->doctor_type_id = $request->doctor;
     $clinic->user_phone = $request->phone;
     $clinic->address = $request->address;
     $clinic->status = 'pending';
     $clinic->save();
     return redirect('/ask-home-clinic')->with('success', 'لقد تم ارسال سؤالك بنجاح !!');
     }

  public function getcvdoc(Request $request)
   {
     $data = DB::table('cv_paids')->where('doctor_id', '=', $request->id)->get();
     return response()->json($data);
     }
////////////////////// Medical File ///////////////////////////////
  public function medicalFile()
   {
        $medicalFiles = DB::table('medical_files')->where('user_id', Auth::user()->id)->get();
        return view('back.pages.client.medical_file')->with('medicalFiles', $medicalFiles);

    }

  public function addmedicalFile()
   {
        return view('back.pages.client.add_medical_file');

    }

  public function storeMedicalFile(Request $request)
  {
        $fils = new medical_file;
        $this->validate(request(), ['name' => 'required|string|max:255',
            'relation' => 'required|string',
            'gender' => 'required|string',
            'date' => 'required|date',
            'doctorName' => 'required|string',
            'doctorPhone' => 'required',
            'address' => 'required',
            'medical' => 'required',
            'during' => 'required',
            'analyz' => 'required',
            'anlayzreslut' => 'required',
            'ray' => 'required',
            'rayresult' => 'required',
            'hasasya' => 'required',
            'hasasyaeat' => 'required',
            'blood' => 'required',
            'smoke' => 'required']);
        $fils->user_id = Auth::user()->id;
        $fils->patient_name = $request->name;
        $fils->relationship = $request->relation;
        $fils->patient_gendar = $request->gender;
        $fils->date = $request->date;
        $fils->doctor_name = $request->doctorName;
        $fils->doctor_phone = $request->doctorPhone;
        $fils->doctor_address = $request->address;
        $fils->medical_list = $request->medical;
        $fils->duration_treatment = $request->during;
        $fils->analyzes_required = $request->analyz;
        $fils->analyzes_result = $request->anlayzreslut;
        $fils->required_radiations = $request->ray;
        $fils->radiations_result = $request->rayresult;
        $fils->sensitivity_medical = $request->hasasya;
        $fils->sensitivity_eats = $request->hasasyaeat;
        $fils->blood_type = $request->blood;
        $fils->smoke = $request->smoke;
        $fils->save();
        return redirect('/medical-file')->with('success', 'لقد تم ارسال سؤالك بنجاح !!');

    }

  public function deleteMedicalFile($file_id)
  {
        DB::table('medical_files')->where('id', $file_id)->delete();
        return redirect('/medical-file')->with('success', 'لقد تم حذف الملف بنجاح !!');
    }

  public function modifyMedicalFile($file_id)
   {
        $medical_file = DB::table('medical_files')->where('id', $file_id)->first();
        return view('back.pages.client.add_medical_file')->with('medical_file', $medical_file);
    }

  public function editMedicalFile($file_id, Request $request)
   {
        $this->validate(request(), ['name' => 'required|string|max:255',
            'relation' => 'required|string',
            'gender' => 'required|string',
            'date' => 'required|date',
            'doctorName' => 'required|string',
            'doctorPhone' => 'required',
            'address' => 'required',
            'medical' => 'required',
            'during' => 'required',
            'analyz' => 'required',
            'anlayzreslut' => 'required',
            'ray' => 'required',
            'rayresult' => 'required',
            'hasasya' => 'required',
            'hasasyaeat' => 'required',
            'blood' => 'required',
            'smoke' => 'required']);
        DB::table('medical_files')->where('id', $file_id)
            ->update(['user_id' => Auth::user()->id,
                'patient_name' => $request->name,
                'relationship' => $request->relation,
                'patient_gendar' => $request->gender,
                'date' => $request->date,
                'doctor_name' => $request->doctorName,
                'doctor_phone' => $request->doctorPhone,
                'doctor_address' => $request->address,
                'medical_list' => $request->medical,
                'duration_treatment' => $request->during,
                'analyzes_required' => $request->analyz,
                'analyzes_result' => $request->anlayzreslut,
                'required_radiations' => $request->ray,
                'radiations_result' => $request->rayresult,
                'sensitivity_medical' => $request->hasasya,
                'sensitivity_eats' => $request->hasasyaeat,
                'blood_type' => $request->blood,
                'smoke' => $request->smoke]);


        return redirect('/medical-file')->with('success', 'تم تعديل الملف بنجاح');

    }

  public  function detailsMedicalFile($file_id)
   {
        $medical_file = DB::table('medical_files')->where('id', $file_id)->first();
        return view('back.pages.client.details_medical_file')->with('medical_file', $medical_file);

    }
///////////////////////////////////////////
  public function requestMedicine()
   {
        $countries = DB::table('countries')->get();
        return view('back.pages.client.request_medicine')
            ->with('countries', $countries);
    }

  public function getpackages(Request $request)
   {

        $data = DB::table('governorates')->where('country_id',$request->id )->get();
        return response()->json($data);

    }

  public function getcity(Request $request)
   {
        $data = DB::table('cities')->where('gov_id', $request->id)->get();
        return response()->json($data);

    }

  public function clickpharm(Request $request)
   {
        $data = DB::table('users')->where('u_city', $request->id)->orderBy('paid', 'desc')->get();
        return response()->json($data);

    }

  public function getpharm(Request $request)
   {
        $data = DB::table('users')->where('u_city', $request->id)->where('paid', 1)->get();
        return response()->json($data);

    }

  public function requestmedicineask(Request $request)
   {
        $medican = new  request_medicin;
        $medican->user_id = Auth::user()->id;
        $medican->country = $request->country;
        $medican->government = $request->governorate;
        $medican->city = $request->city;
        $medican->pharm_id = $request->pharm;
        $medican->medicin = $request->medicin;
        $medican->detils = $request->detial;
        $medican->save();
        return redirect('/request-file')->with('success', 'لقد تم ارسال سؤالك بنجاح !!');

    }

  public function requestget()
   {

        $requstFile = DB::table('request_medicins')
            ->where('user_id', Auth::user()->id)
            ->join('countries', 'request_medicins.country', '=', 'countries.id')
            ->join('governorates', 'request_medicins.government', '=', 'governorates.id')
            ->join('cities', 'request_medicins.city', '=', 'cities.id')
            ->join('users', 'request_medicins.pharm_id', '=', 'users.id')
            ->select('request_medicins.*', 'countries.country_title', 'governorates.g_title', 'cities.c_title', 'users.username')
            ->get();
        return view("back.pages.client.request_file")->with('requstFile', $requstFile);
    }

  public function editerequest($id)
   {

        $countries = DB::table('countries')->get();
        $governorates = DB::table('governorates')->get();
        $cities = DB::table('cities')->get();
        $users = DB::table('users')->get();
        $requestfileback = DB::table('request_medicins')->where('id', $id)->first();
        return view('back.pages.client.request_medicine')
            ->with('countries', $countries)
            ->with('governorates', $governorates)
            ->with('cities', $cities)
            ->with('users', $users)
            ->with('requestfileback', $requestfileback);
    }

  public function editeDone(Request $request , $id)
   {
        DB::table('request_medicins')->where('id', $id)->update(array(

            'user_id' => Auth::user()->id,
            'country' => $request->country,
            'government' => $request->governorate,
            'city' => $request->city,
            'pharm_id' => $request->pharm,
            'medicin' => $request->medicin,
            'detils' => $request->detial,
        ));


        return redirect('request-file')->with('success', 'تم تعديل البيانات بنجاح');
    }

  public function deleterequest(Request $request , $id)
   {
        DB::table('request_medicins')->where('id', $id)->delete();
        return redirect('request-file')->with('success', 'تم حذف الطلب البيانات بنجاح');
    }

  public function jobs()
   {
        DB::table('');
    }

  public function getdoctors(Request $request)
   {
    $data = DB::table('clients')->where([
                                            ['client_type','=',3]
                                           ,['doc_type','=',$request->id]
                                           ])->get();
    return response()->json($data);
    }

 public function medicalConsulation()
   {
       return view("back.pages.client.medical_consultation");
     }


}
