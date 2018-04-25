<?php

// front
Route::get('/', 'HomeController@home');

//user login
Route::get('/login', 'UserController@login');
Route::get('checklogin', array('as' => 'checklogin', function () {
    if (isset(Auth::user()->id) && Auth::user()->confirmed == 1) {
        if (Auth::user()->u_type == 1 || Auth::user()->u_type == 2) {
            return redirect('/');
        } elseif (Auth::user()->u_type == 3) {
            return redirect('/');
        } elseif (Auth::user()->u_type == 4) {
            return redirect('/');
        } elseif (Auth::user()->u_type == 5) {
            return redirect('/');
        } else {
            auth()->logout();
            return redirect('/');
        }
    } else {
        auth()->logout();
        return redirect('/login')->with('fail', 'الحساب غير مفعل , برجاء فحص البريد الالكترونى لتفعيل الحساب');
    }
}));
Route::post('sessionstore', 'SessionController@sessionStore');

//regiser
Route::get('/client-register', 'RegistrationController@clientRegister');
Route::get('/pharmacy-register', 'RegistrationController@pharmacyRegister');
Route::get('/pharmacist-register', 'RegistrationController@pharmacistRegister');
Route::get('/firm-register', 'RegistrationController@firmRegister');

Route::post('/client-store', 'RegistrationController@userStore');
Route::post('/pharmacist-store', 'RegistrationController@userStore');
Route::post('/pharmacy-store', 'RegistrationController@userStore');
Route::post('/firm-store', 'RegistrationController@userStore');

//verify email
Route::get('register/verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'RegistrationController@confirm'
]);
Route::get('/about-us', 'AboutusController@aboutus');
Route::get('/contact-us', 'ContactusController@contactus');

Route::group(['middleware' => ['chackuser', 'auth']], function () {

    //General  Functions=>ClientController
    Route::get('/client-account', 'ClientController@account');
    Route::get('/client-account-setting/', 'ClientController@accountSetting');
    Route::post('/update-client/{user_id}', 'ClientController@updateClient');
    Route::get('/ask-file', 'ClientController@getMyAsk');
    Route::get('/ask-doctor', 'ClientController@askDoctor');
    Route::post('/store-ask-doctor', 'ClientController@storeAskDoctor');
    Route::get('/delete-ask-doctor/{ask_id}', 'ClientController@deleteAskDoctor');
    Route::get('/modify-ask-doctor/{ask_id}', 'ClientController@modifyAskDoctor');
    Route::post('/edit-ask-doctor/{ask_id}', 'ClientController@editAskDoctor');
    Route::get('/medical-file', 'ClientController@medicalFile');
    Route::get('/add-medical-file', 'ClientController@addmedicalFile');
    Route::post('/store-medical/', 'ClientController@storeMedicalFile');
    Route::get('/delete-medical-file/{file_id}', 'ClientController@deleteMedicalFile');
    Route::get('/modify-medical-file/{file_id}', 'ClientController@modifyMedicalFile');
    Route::post('/edit-medical-file/{file_id}', 'ClientController@editMedicalFile');
    Route::get('/details-medical-file/{file_id}', 'ClientController@detailsMedicalFile');
    Route::get('/client-request-medicine', 'ClientController@requestMedicine');
    Route::get('getpackages/', 'ClientController@getpackages');


    Route::post('/request-medicine-search', 'ClientController@requestmedicineask');
    Route::get('/request-file', 'ClientController@requestget');
    Route::get('getcity', 'ClientController@getcity');
    Route::get('getpharm', 'ClientController@getpharm');
    Route::get('clickpharm', 'ClientController@clickpharm');
    //Route::post('/getgovernorate/{val}','ClientController@getGov');
    Route::get('/edite-request/{id}', 'ClientController@editerequest');
    Route::get('/delete-request/{id}', 'ClientController@deleterequest');
    Route::post('/edite-done/{id}', 'ClientController@editeDone');

///**********10-4HW/**********////
    Route::get('/getdoctors', 'ClientController@getdoctors');
    Route::get('/askDoctors-details/{ask_id}', 'ClientController@AskDoctorsDetails');
    Route::post('/store-comments/{ask_id}', 'ClientController@storeComment');
    Route::get('/gethomedoc/', 'ClientController@gethomedoc');
    Route::get('/gethomename/', 'ClientController@gethomename');
    Route::get('/gethomedocscp/', 'ClientController@gethomedocscp');
    Route::post('/store-home-clinic/', 'ClientController@storehomeclinic');
    /////**********11-4HW***********////
    Route::get('/medical-consulation', 'ClientController@getMyAsk');
    Route::get('/home-clinic', 'ClientController@getHomeClinic');
    Route::post('/store-comments-clinic/{id}', 'ClientController@storeCommentsClinic');
    Route::get('/reject-home-clinic/{home_id}', 'ClientController@rejectHomeClinic');
    Route::get('/accept-home-clinic/{home_id}', 'ClientController@acceptHomeClinic');
    Route::get('/details-home-clinic/{home_id}', 'ClientController@homeclinicDetails');
/////**********17-4HW***********////
    Route::get('/delete-home-clinic/{id}', 'ClientController@deleteHomeClinic');
    //************************///
    Route::get('/ask-home-clinic', 'ClientController@askHomeClinic');
    Route::get('/getcvdoc/', 'ClientController@getcvdoc');
});

Route::group(['middleware' => 'auth'], function () {

    //General  Functions=>UserController
    Route::get('/places', 'UserController@AllPlaces');
    Route::get('/all-jobs', 'UserController@alljobs');

    Route::get('/jobs', 'UserController@jobs');
    Route::get('/add-job', 'UserController@addJob');
    Route::post('/store-job', 'UserController@storeJob');
    Route::get('/edit-job/{job_id}', 'UserController@editJob');
    Route::post('/update-job/{job_id}', 'UserController@updateJob');
    Route::get('/delete-job/{job_id}', 'UserController@deleteJob');
    Route::get('/sell-buy-places', 'UserController@sellBuyPlaces');
    Route::get('/add-sell-buy-place', 'UserController@addSellBuyPlace');
    Route::post('/store-sell-buy-place', 'UserController@storeSellBuyPlace');
    Route::get('/edit-sell-buy-place/{place_id}', 'UserController@editSellBuyPlace');
    Route::post('/update-sell-buy-place/{place_id}', 'UserController@updateSellBuyPlace');
    Route::get('/delete-place/{place_id}', 'UserController@deletePlace');
    Route::get('/cure2us-offers', 'UserController@cure2usOffers');


    //pharmacy   Functions=>PharmacyController
    Route::get('/pharmacy-account', 'PharmacyController@account');
    Route::get('/pharmacy-account-setting/', 'PharmacyController@accountSetting');
    Route::post('/update-pharmacy/{user_id}', 'PharmacyController@updatePharmacy');
    Route::get('/firms-offers', 'PharmacyController@firmsOffers');
    Route::get('/getFirms/', 'PharmacyController@getFirms');
    Route::get('/orders-medicines', 'PharmacyController@ordersMedicine');
    Route::get('/pharmacy-request-medicine', 'PharmacyController@requestMedicine');
    Route::post('/store-request-pharm-medicine', 'PharmacyController@storeRequestMedicine');
    Route::get('/add-request-pharm-medicine', 'PharmacyController@addrequestMedicine');
    Route::get('/delete-request-pharm-medicine/{request_id}', 'PharmacyController@deleteRequestMedicinePharm');
    Route::get('/edit-request-pharm-medicine/{request_id}', 'PharmacyController@editRequestMedicinePharm');
    Route::post('/update-request-pharm-medicine/{request_id}', 'PharmacyController@updateRequestMedicinePharm');
    Route::get('/details-request-medicine/{order_id}', 'PharmacyController@detailsOrderMedcine');
    Route::post('/update-status-request-medicine/{order_id}', 'PharmacyController@updateStatusOrderMedcine');
    Route::get('/excess-medicines', 'PharmacyController@excessMedicines');
    Route::get('/requset-excess-medicines/{requset_id}', 'PharmacyController@requestExcessMedicines');
    Route::post('/add-requset-excess-medicines/{requset_id}', 'PharmacyController@addRequestExcessMedicines');
    Route::get('/surplus-medicines', 'PharmacyController@surplusMedicines');
    Route::get('/add-surplus-medicines', 'PharmacyController@addSurplusMedicines');
    Route::post('/store-surplus-medicines', 'PharmacyController@storeSurplusMedicines');
    Route::get('/edit-surplus-medicines/{surplus_id}', 'PharmacyController@editSurplusMedicines');
    Route::post('/update-surplus-medicines/{surplus_id}', 'PharmacyController@updateSurplusMedicines');
    Route::get('/delete-surplus-medicines/{surplus_id}', 'PharmacyController@deleteSurplusMedicines');
    //****17-4 HW ****/////
    Route::get('/request-surplus-medicines', 'PharmacyController@requestSurplusMedicines');
    //**************///////
    //****18-4 HW ****/////
    Route::get('/accept-request-surplus/{excess}', 'PharmacyController@acceptRequestSurplusMedicines');
    Route::get('/reject-request-surplus/{excess}', 'PharmacyController@rejectRequestSurplusMedicines');
    //**************///////
    //firms  Functions=>FirmController
    Route::get('/firm-account', 'FirmController@account');
    Route::get('/firm-account-setting/', 'FirmController@accountSetting');
    Route::post('/update-firm/{user_id}', 'FirmController@updateFirm');
    Route::get('/firm-offers', 'FirmController@firmOffers');
    Route::get('/add-firm-offer', 'FirmController@addFirmOffer');
    Route::post('/store-firm-offer', 'FirmController@storeFirmOffer');
    Route::get('/modify-firm-offer/{offer_id}', 'FirmController@modifyFirmOffer');
    Route::post('/update-firm-offer', 'FirmController@updateFirmOffer');
    Route::get('/delete-firm-offer/{offer_id}', 'FirmController@deleteFirmOffer');
    Route::get('/firm-medicines', 'FirmController@firmMedicines');
    Route::get('/add-firm-medicine', 'FirmController@addFirmMedicine');
    Route::post('/store-firm-medicine', 'FirmController@storeFirmMedicine');
    Route::get('/delete-firm-medicine/{medicine_id}', 'FirmController@deleteFirmMedicine');
    Route::get('/edit-firm-medicine/{medicine_id}', 'FirmController@editFirmMedicine');
    Route::post('/update-firm-medicine/{medicine_id}', 'FirmController@updateFirmMedicine');
    Route::get('/details-firm-medicine/{medicine_id}', 'FirmController@detailsFirmMedicine');
    Route::get('/preview-statistics', 'FirmController@previewStatistics');
    //****17-4 HW ****/////
    /////// Reuest Medicine from Pharmacy//////////
    Route::get('/request-medicine-pharm', 'FirmController@requestMedicinePharm');
    Route::get('/accept-request/{request_id}', 'FirmController@acceptRequestMedicinePharm');
    Route::get('/reject-request/{request_id}', 'FirmController@rejectRequestMedicinePharm');

    //**************///////
    //logout
    Route::post('logout', 'SessionController@destroy');

});

// admin
Route::get('/ph-admin', function () {
    return view('back.pages.admin.login');
});

Route::post('adminsessionstore', 'SessionController@adminSessionStore');

// Route::get('adminchecklogin',array('as'=>'adminchecklogin',function(){
//     if (isset(Auth::user()->id) && Auth::user()->admin == 1)
//     {
//         if(Auth::user()->u_type == 1)
//         {
//             return redirect('/admin');
//         }elseif(Auth::user()->u_type == 2){
//             return redirect('/admin');
//         }else{
//             auth()->logout();
//             return redirect('/admin');
//         }
//     }else{
//         auth()->logout();
//         return redirect()->back();
//     }
// }));

Route::get('adminchecklogin', array('as' => 'adminchecklogin', function () {
    if (Auth::guard('admin')->user()->super_admin == 1) {
        //	return Auth::guard('webadmin')->user()->super_admin;
        return redirect('/admin-account');
    } else {
        auth()->logout();
        return redirect('/');
    }
}));

//Route::get('protected', ['middleware' => ['auth', 'admin'], function() {
Route::group(['middleware' => 'auth:admin'], function () {
    //General  Functions=>adminController
    //***** 19-4 HW*******///
    Route::get('/admin-account', 'AdminController@account');
    Route::get('/add-admin', 'AdminController@adminRegister');
    //*******22-4 HW*********//
    Route::post('/admin-store', 'AdminController@storeAdmin');
    //****************//
    Route::get('/admin', 'AdminController@main');
    Route::post('/store-about', 'AdminController@storeabout');
    Route::post('/update-about/{id}', 'AdminController@updateabout');
    //****************//
    //  Route::get('/admin', 'AdminController@main');
    Route::get('/about-us-setting', 'AdminController@aboutUsSetting');
    Route::get('/contact-us-setting', 'AdminController@contactUsSetting');
    Route::get('/messages', 'AdminController@messages');
    Route::get('/social-links-setting', 'AdminController@SocialLinksSetting');
    Route::post('/social-links-edit', 'AdminController@SocialLinksEdit');
    Route::post('/logout-admin', 'SessionController@destroy');

});

//}]);
