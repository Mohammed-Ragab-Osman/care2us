<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Job;
use App\Sell_buy_place;
use DB;
use Auth;

class UserController extends Controller
{


    public function login()
    {
        return view('front.pages.login');
    }

    public function account()
    {
        return view('back.pages.main');
    }

    // Jobs functions
    public function jobs()
    {
        $jobs = DB::table('jobs')->where('publisher_id', Auth::user()->id)->where('status', 1)->get();
        $job_types = DB::table('job_types')->get();
        return view('back.pages.user.jobs')
            ->with('jobs', $jobs)
            ->with('job_types', $job_types);
    }

    public function addJob()
    {
        $job_types = DB::table('job_types')->get();
        return view('back.pages.user.add_job')
            ->with('job_types', $job_types);
    }

    public function storeJob(Request $request)
    {
        $this->validate(request(), [
            'job_title' => 'required|string|max:60',
            'job_address' => 'required|string|max:60',
            'job_desc' => 'required|max:150'
        ]);
        $job = new Job;
        $job->publisher_id = Auth::user()->id;
        $job->job_title = $request->job_title;
        $job->job_type = $request->job_type;
        $job->job_address = $request->job_address;
        $job->job_desc = $request->job_desc;
        $job->status = 1;
        $job->expiry_date = $request->expiry_date;

        $job->save();
        return redirect('/jobs')->with('success', 'تم اضافة وظيفة بنجاح');
    }

    public function editJob($job_id)
    {
        $job = DB::table('jobs')->where('id', $job_id)->first();
        $job_types = DB::table('job_types')->get();
        return view('back.pages.user.add_job')
            ->with('job', $job)
            ->with('job_types', $job_types);
    }

    public function updateJob($job_id, Request $request)
    {
        $this->validate(request(), [
            'job_title' => 'required|string|max:255',
            'job_address' => 'required|string|max:60',
            'job_desc' => 'required|max:150'
        ]);
        DB::table('jobs')->where('id', $job_id)->update(array(

            'job_title' => $request->job_title,
            'job_type' => $request->job_type,
            'job_address' => $request->job_address,
            'job_desc' => $request->job_desc,
            'expiry_date' => $request->expiry_date,
        ));
        return redirect('/jobs')->with('success', 'تم التعديل بنجاح');
    }

    public function deleteJob($job_id)
    {
        DB::table('jobs')->where('id', '=', $job_id)->delete();
        return redirect('/jobs')->with('success', 'تم الحذف بنجاح');
    }

    //Sell and buy places Functions
    public function sellBuyPlaces()
    {
        $sell_buy_places = DB::table('sell_buy_places')->where('publisher_id', Auth::user()->id)->where('status', 1)->get();
        $place_types = DB::table('place_types')->get();
        return view('back.pages.user.sell_buy_places')
            ->with('sell_buy_places', $sell_buy_places)
            ->with('place_types', $place_types);
    }

    public function addSellBuyPlace()
    {
        $place_types = DB::table('place_types')->get();
        return view('back.pages.user.add_sell_buy_place')
            ->with('place_types', $place_types);
    }

    public function storeSellBuyPlace(Request $request)
    {
        $this->validate(request(), [
            'place_name' => 'required|string|max:255',
            'place_address' => 'required|string|max:255',
            'place_desc' => 'required|max:150'
        ]);

        $sell_buy = new Sell_buy_place;
        $sell_buy->publisher_id = Auth::user()->id;
        $sell_buy->place_name = $request->place_name;
        $sell_buy->place_type = $request->place_type;
        $sell_buy->place_address = $request->place_address;
        $sell_buy->place_desc = $request->place_desc;
        $sell_buy->status = 1;
        $sell_buy->publish_date = date('m/d/Y');

        $sell_buy->save();
        return redirect('/sell-buy-places')->with('success', 'تم اضافة مكان بنجاح');
    }

    public function deletePlace($place_id)
    {
        DB::table('sell_buy_places')->where('id', '=', $place_id)->delete();
        return redirect('/sell-buy-places')->with('success', 'تم الحذف بنجاح');
    }

    public function editSellBuyPlace($place_id)
    {
        $place_types = DB::table('place_types')->get();
        $place = DB::table('sell_buy_places')->where('id', '=', $place_id)->first();
        return view('back.pages.user.add_sell_buy_place')
            ->with('place_types', $place_types)
            ->with('place', $place);

    }

    public function updateSellBuyPlace($place_id, Request $request)
    {
        $this->validate(request(), [
            'place_name' => 'required|string|max:255',
            'place_address' => 'required|string|max:255',
            'place_desc' => 'required|max:150'
        ]);
        DB::table('sell_buy_places')->where('id', $place_id)->update(array(

            'place_name' => $request->place_name,
            'place_type' => $request->place_type,
            'place_address' => $request->place_address,
            'place_desc' => $request->place_desc
        ));
        return redirect('/sell-buy-places')->with('success', 'تم التعديل بنجاح');
    }

    // Cure2Us Offers Functions

    public function cure2usOffers()
    {
        return view('back.pages.user.cure2us_offers');
    }




    // Jobs functions
    public function alljobs()
    {
        $dateFormat = date('m/d/Y');
        $s = 1;
        $jobs = DB::table('jobs')->where('expiry_date', '>=', $dateFormat)->where('jobs.status', '=', 1)
            ->join('users', 'jobs.publisher_id', '=', 'users.id')
            ->select('jobs.*', 'users.paid', 'users.username')
            ->orderBy('paid', 'DESC')
            ->get();

        return view('front.pages.jobs')
            ->with('jobs', $jobs);
    }


    public function AllPlaces()
    {
        $sell_buy_places = DB::table('sell_buy_places')->where('sell_buy_places.status', '=', 1)
            ->join('users', 'sell_buy_places.publisher_id', '=', 'users.id')
            ->join('place_types', 'sell_buy_places.place_type', '=', 'place_types.id')
            ->select('sell_buy_places.*', 'users.paid', 'users.username', 'place_types.title')
            ->orderBy('paid', 'DESC')
            ->get();
        return view('front.pages.places')
            ->with('sell_buy_places', $sell_buy_places);
    }


    // Cure2Us Offers Functions

}
