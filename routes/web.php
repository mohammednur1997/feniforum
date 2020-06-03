<?php

//ALTER TABLE `users` CHANGE `mobile` `mobile` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|sdfa

*/



//spcial login ar jonno route
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback','Auth\LoginController@handleProviderCallback');



Route::get('/', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');

Route::group(['prefix' => 'admin'], function () {
  Route::get('/', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
  Route::post('/login/check', 'AdminAuth\LoginController@login')->name('admin.login.check');
  Route::post('/logout/murad', 'AdminAuth\LoginController@logout')->name('admin.logout.check');
/*  Route::get('/logout_admin', 'AdminAuth\LoginController@logout')->name('admin.logout');*/

/*  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('admin.register');*/
/*  Route::post('/register', 'AdminAuth\RegisterController@register')->name('admin.register');*/

//password email send
   Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password');//main route to send the link in my gmail

 //password reset
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm')->name('admin.password.form');

Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('admin.password.reset');
Route::get('/blog/comment', 'BlogController@comment')->name('admin.blog.comment');


  Route::get('/', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
Route::middleware(['admin'])->group(function () {
	
	 Route::get('/approv/{id}', 'UserProfileContoller@approv')->name('approv');
   Route::get('/donat-approv/{id}', 'DonationController@approv')->name('donat_approv');

   Route::post('/committeeMemberList/store', 'CommitteeMemberListController@store')->name('admin.committeeMemberList.store'); 
   Route::post('/committeeMemberList/pradesh/store', 'CommitteeMemberListController@Pradeshstore')->name('admin.committeeMemberList.pradesh.store'); 
   
   Route::get('/committeeMemberlist/{id}', 'CommitteeMemberListController@committeeList')->name('admin.committeeMemberList'); 

   Route::get('/committeeMemberByYear/{commitee_id}/{year_id}', 'CommitteeMemberListController@committeeMemberByYear')->name('admin.committeeMemberByYear'); 

   Route::get('/committeeMemberlist', 'CommitteeMemberListController@committeeListPage')->name('admin.committeeMemberListPage'); 

   Route::get('/committeeMemberlist/destroy/{id}', 'CommitteeMemberListController@destroy')->name('admin.committeeMemberList.destroy'); 

   Route::post('/committeeMemberlist/update/{id}', 'CommitteeMemberListController@update')->name('admin.committeeMemberList.update'); 

   Route::post('/pracommittee/update/{id}', 'CommitteeMemberListController@praupdate')->name('admin.pracommittee.update'); 

   //admin blog ar jonno route 
  Route::get('/blog/publish/{id}', 'BlogController@publish')->name('admin.blog.publish'); 
 Route::get('/blog/unpublish/{id}', 'BlogController@unpublish')->name('admin.blog.unpublish');

/*Route::get('/blog/comment', 'BlogController@comment')->name('admin.blog.comment');*/

  Route::post('/blog/update/{id}', 'BlogController@update')->name('admin.blog.update'); 

   //admin blog Categorys ar jonno route 
Route::get('/blog/category/{id}', 'BlogCategoryController@edit')->name('admin.blog.category'); 
Route::get('/blog/destroy/{id}', 'BlogCategoryController@destroy')->name('admin.blog.destroy'); 

Route::get('/member/search', 'UserProfileContoller@search')->name('admin.member.search'); 
Route::get('/Commitimember/search', 'CometiMemberController@search')->name('admin.Commitimember.search'); 



   // Protinidi ar jonno route
   Route::get('/protinidi', 'ProtinidiController@index')->name('admin.protinidi');
   Route::post('/protinidi/store', 'ProtinidiController@store')->name('admin.protinidi.store');
   Route::post('/protinidi/update/{id}', 'ProtinidiController@update')->name('admin.protinidi.update');
   Route::get('/protinidi/delete/{id}', 'ProtinidiController@destroy')->name('admin.protinidi.delete');

  //Central protinidi ar jonno route
   Route::get('/Centralprotinidi', 'ProtinidiController@cindex')->name('admin.Centralprotinidi');
   Route::post('/Centralprotinidi/store', 'ProtinidiController@cstore')->name('admin.Centralprotinidi.store');
   Route::post('/Centralprotinidi/update/{id}', 'ProtinidiController@cupdate')->name('admin.Centralprotinidi.update');
   Route::get('/Centralprotinidi/delete/{id}', 'ProtinidiController@cdestroy')->name('admin.Centralprotinidi.delete');

   //admin event ar jonno route
   Route::get('/eventList/{id}', 'CampaignsController@eventList')->name('admin.eventList');
   Route::get('/eventPage/{id}', 'CampaignsController@edit')->name('admin.eventpage');
   Route::get('/event/close/{id}', 'CampaignsController@close')->name('admin.event.close');
Route::post('/event/update/{id}', 'CampaignsController@update')->name('admin.event.update');
    Route::get('/event/destroy/{event_id}/{id}', 'CampaignsController@destroy')->name('admin.event.destroy');

    Route::get('/event/destroy2/{id}', 'CampaignsController@destroy2')->name('admin.event.destroy2');



    Route::get('/eventListByYear/{year_id}', 'CampaignsController@eventListByYear')->name('admin.eventListByYear');

     Route::get('/campaing/permanent', 'CampaignsController@permanent')->name('campaing.permanent.create');

 // donation ar jonno route...
  Route::get('/donation/eventList', 'DonationController@eventList')->name('admin.donation.eventList');

  Route::get('/alldonation', 'DonationController@alldonation')->name('admin.alldonation');

  Route::get('/donation/event/{id}', 'DonationController@event')->name('admin.event');
  Route::get('/donation/index/{id}', 'DonationController@index')->name('admin.donation.index');

  Route::get('/donation/edit/{id}', 'DonationController@edit')->name('admin.donation.edit');

  Route::post('/donation/update/{id}', 'DonationController@update')->name('admin.donation.update');
  Route::get('/donation/destroy/{id}', 'DonationController@destroy')->name('admin.donation.destroy');

  Route::get('/eventList/destroy/{id}', 'DonationController@eventDelete')->name('admin.eventList.destroy');

  // add extra moneay in our account
   Route::post('/extra/add', 'mainAccountController@addoney')->name('admin.extra.moneay');




  // accounting ar jonno Expense
   Route::post('/expense/store', 'ExpenseController@store')->name('admin.expense.store');
   Route::get('/expense/{id}', 'ExpenseController@index')->name('admin.expense');
   Route::get('/invoice/{id}', 'ExpenseController@generateInvoice')->name('admin.order.invoice');
  Route::get('/expense/destroy/{id}', 'ExpenseController@destroy')->name('admin.expense.destroy'); 
   //main account ar jonno route
 Route::get('/collection/year', 'mainAccountController@year')->name('admin.collect.year');
 Route::get('/collection/money/{id}', 'mainAccountController@money')->name('admin.collection.money');

  Route::get('/eventCollect/year', 'mainAccountController@campaingYear')->name('admin.eventCollect.year');

  Route::get('/eventCollect/money/{id}', 'mainAccountController@eventcollection')->name('admin.eventcollection.money');

  Route::get('/eventDetails/{id}', 'mainAccountController@eventDetails')->name('admin.eventDetails');

    Route::get('/account/all', 'mainAccountController@account')->name('admin.account.all');
    Route::post('/need/all', 'mainAccountController@need')->name('admin.need.money');


  Route::get('/change/password/', 'AdminController@changePassword')->name('admin.change.password');

   Route::post('/changePassword', 'AdminController@changePasswordStore')->name('admin.changePassword.store');

   Route::get('/create/user/', 'AdminController@createUser')->name('admin.create.user'); 

Route::get('/setting/account','AdminController@setting')->name('account'); 

    Route::post('/account/store', 'AdminController@accountStore')->name('admin.account.store');

 Route::post('/user/store', 'AdminController@store')->name('admin.user.store');
 Route::get('/user/destory/{id}', 'AdminController@destroy')->name('admin.user.destroy');
 Route::post('/user/update/{id}', 'AdminController@update')->name('admin.user.update');

 Route::get('/inbox', 'AdminController@inbox')->name('admin.inbox');
 Route::post('/inbox/seen/{id}', 'AdminController@seen')->name('admin.inbox.seen');
 Route::get('/inbox/unseen/{id}', 'AdminController@unseen')->name('admin.inbox.unseen');
 Route::get('/message/destroy/{id}', 'AdminController@destroymsg')->name('admin.inbox.destroy');

  Route::post('/send/message', 'AdminController@messageSend')->name('admin.send.messsge');

  
Route::resources([
        'admin' => 'AdminController',
        'dashboard' => 'AdminDashboard',
        'category' => 'CategoryController',
        'testimonial' => 'TestimonialController',
        'payment' => 'PaymentController',
        'blog' => 'BlogController',
        'blogCat' => 'BlogCategoryController',    
        'email' => 'EmailController',
        'voting' => 'VotingController',
        'subcribe' => 'SubcribeController',
        'app' => 'AppconfigController',
        'languageword' => 'LanguageWordController',
        'language' => 'LanguageController',
        'campaing' => 'CampaignsController',
        'member' => 'UserProfileContoller',
		'mtype' => 'MemberTypeController',
        'news' => 'newscontroller',
        'slider' => 'SliderController',
        'social' => 'SocialiConController',
		'gallery' => 'GalleryController',
        'page' => 'PageController',
        'upozila' => 'UpozilaController',
        'union' => 'UnionController',
        'state' => 'StateController',
         'committeeMember'=>'CometiMemberController',
         'committee'=>'Committeecontroller',
         'designation'=>'DiganationController',
         'years'=>'YearsController',
    ]);

  Route::post('/localizationPost', 'AppconfigController@localizationPost')->name('localizationPost');
  Route::post('/postGeneralSetting', 'AppconfigController@postGeneralSetting')->name('postGeneralSetting');
  Route::post('/postLogoSetting', 'AppconfigController@postLogoSetting')->name('postLogoSetting');
  Route::post('/Settings', 'LanguageController@manage_language')->name('Settings');
  Route::post('/postAllPage', 'AppconfigController@postAllPage')->name('postAllPage');

  route::post('slider/delete','SliderController@delete')->name('slider.delete');
  route::post('social/delete','SocialiConController@delete')->name('social.delete');

});

});


// API routes
Route::get('get-union/{id}', function($id){
  return json_encode(App\Union::where('upozila_id', $id)->get());
});

Route::get('get-unionEdit/{id}', function($id){
  return json_encode(App\Union::where('upozila_id', $id)->get());
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('/clear-config', function() {
    Artisan::call('config:clear');
    return "config is cleared";
});


