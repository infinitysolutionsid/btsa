<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\File;
use Illuminate\Support\Facades\Redirect;
// CLEAR AND OPTIMIZE
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    return redirect('/');
});
Route::get('/config-cache', function () {
    $exitCode = Artisan::call('config:cache');
    return redirect('/');
});
Route::get('/optimize-clear', function () {
    $exitCode = Artisan::call('optimize:clear');
    return redirect('/');
});
Route::get('/clear-view', function () {
    $exitCode = Artisan::call('view:clear');
    return redirect('/');
});
Route::get('/newissue', function () {
    return view('emails.sites.newIssue');
});

// Social Media Redirect
Route::get('/facebook', function () {
    return Redirect::to('https://facebook.com/BTSALogistics');
});
Route::get('/instagram', function () {
    return Redirect::to('https://www.instagram.com/btsalogistics');
});
Route::get('/youtube', function () {
    return Redirect::to('https://www.youtube.com/c/BTSALogisticsYourReliableLogisticsPartner');
});
Route::get('/wikipedia', function () {
    return Redirect::to('https://id.wikipedia.org/wiki/Pengguna:Btsalogistics');
});
// TEST EMAIL COMMENT
// Route::get('/kirimemail', function () {
//     \Mail::raw('Hallo Bintang', function ($message) {
//         $message->to('bintang.infinitysolutions@gmail.com', 'Bintang Tobing');
//         $message->subject('Laravel Mail Test Raw');
//     });
// });
Route::get('/btsa-mobile', function () {
    return File::get(public_path() . '/btsa-mobile/index.php');
});

// Homepage Data
Route::get('/', 'DashboardController@index');
Route::get('/tentang-kami', 'DashboardController@tentangkami');
Route::get('/blog', 'DashboardController@blog');
Route::get('/galeri', 'DashboardController@galeri');
Route::get('/karir', 'DashboardController@karir');

Route::group(['middleware' => 'web'], function () {
    Route::get('/trace-track', 'DashboardController@traceview');
    Route::get('/result', 'DashboardController@traceresult');
});

Route::post('/send', 'DashboardController@sendEmail');
Route::get('/404', 'DashboardController@ernodata');
Route::get('/restricted', 'AuthController@login')->name('signin');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');
Route::post('/member/registered/{tokens}', 'MemberController@registered');

// Candidate proses
Route::prefix('candidate')->group(function () {
    Route::get('/', 'candidateController@index');
    Route::post('/proses', 'candidateController@proses');

    Route::get('/get-provinsi', 'candidateController@getprovinsi');
    Route::get('/get-domisili/{province_id}', 'candidateController@getdomisili');
    Route::get('/get-kecamatan/{id}', 'candidateController@getkecamatan');
    Route::get('/get-kelurahan/{id}', 'candidateController@getkelurahan');
});
Route::get('/step2', 'candidateController@step2');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/online-users', 'MemberController@online');
    Route::get('/message/{id}', 'MemberController@getMessage')->name('message');

    Route::get('/dashboard', 'DashController@index');
    // Route::get('member/{id}/{username}', 'MemberController@view');
    Route::get('member/{id}/edit', 'MemberController@edit');
    Route::post('member/{id}/update', 'MemberController@update');

    // PESAN
    // Route::get('/direct-messages', 'MessagesController@index');
});
Route::group(['middleware' => ['auth', 'roleCheck:administrator']], function () {
    // ROUTE VIEW
    Route::get('/legal', 'ItemController@index');
    Route::get('/jadwal', 'KategoriController@index');
    Route::get('/member', 'MemberController@index');
    Route::get('/vessel', 'VesselController@index');

    // ROUTE CREATE NEW
    Route::post('/legal/addnew', 'ItemController@addnewitem');
    Route::post('/jadwal/addnew', 'KategoriController@addnew');
    Route::post('/member/addnew', 'MemberController@addnewmember');
    Route::post('/vessel/addnew', 'VesselController@addnew');

    // ROUTE GET (EDIT ROUTE)
    Route::get('legal/{legal_id}/edit', 'ItemController@edit');
    Route::get('jadwal/{id}/edit', 'KategoriController@edit');
    Route::get('member/{member_id}/edit', 'MemberController@edit');
    Route::get('vessel/{vessel_id}/edit', 'VesselController@edit');

    // ROUTE UPDATE (UPDATE ROUTE)
    Route::post('legal/{legal_id}/update', 'ItemController@update');
    Route::post('jadwal/{id}/update', 'KategoriController@update');
    Route::post('member/{member_id}/update', 'MemberController@update');
    Route::post('vessel/{vessel_id}/update', 'VesselController@update');

    // ROUTE DELETE (DELETE ROUTE)
    Route::get('legal/{legal_id}/delete', 'ItemController@delete');
    Route::get('jadwal/{id}/delete', 'KategoriController@delete');
    Route::get('member/{member_id}/delete', 'MemberController@delete');
    Route::get('vessel/{vessel_id}/delete', 'VesselController@delete');
});
Route::group(['middleware' => ['auth', 'roleCheck:administrator,it']], function () {
    Route::get('/member', 'MemberController@index');
    Route::post('/member/addnew', 'MemberController@addnewmember');
    Route::get('member/{member_id}/edit', 'MemberController@edit');
    Route::post('member/{member_id}/update', 'MemberController@update');
    Route::get('member/{member_id}/delete', 'MemberController@delete');
});
// MEMBER JADWAL KAPAL & VESSEL AUTHORITY
Route::group(['middleware' => ['auth', 'roleCheck:member,administrator']], function () {
    // ROUTE VIEW
    Route::get('/jadwal', 'KategoriController@index');
    Route::get('/vessel', 'VesselController@index');

    // ROUTE CREATE NEW
    Route::post('/jadwal/addnew', 'KategoriController@addnew');
    Route::post('/vessel/addnew', 'VesselController@addnew');

    // ROUTE GET (EDIT ROUTE)
    Route::get('jadwal/{id}/edit', 'KategoriController@edit');
    Route::get('vessel/{vessel_id}/edit', 'VesselController@edit');

    // ROUTE UPDATE (UPDATE ROUTE)
    Route::post('jadwal/{id}/update', 'KategoriController@update');
    Route::post('vessel/{vessel_id}/update', 'VesselController@update');

    // ROUTE DELETE (DELETE ROUTE)
    Route::get('jadwal/{id}/delete', 'KategoriController@delete');
    Route::get('vessel/{vessel_id}/delete', 'VesselController@delete');
});
// LEGAL MEMBER AUTHORITY
Route::group(['middleware' => ['auth', 'roleCheck:legal,administrator']], function () {
    // ROUTE VIEW
    Route::get('/legal', 'ItemController@index');

    // ROUTE CREATE NEW
    Route::post('/legal/addnew', 'ItemController@addnewitem');
});
Route::group(['middleware' => ['auth', 'roleCheck:hrd,administrator']], function () {
    route::get('/candidate/managements', 'candidateController@managements');
    Route::get('/candidate/interviewed', 'candidateController@interviewed');
    Route::get('/candidate/managements/{candidate_id}/view', 'candidateController@viewcandidate');
    Route::get('/candidate/managements/{candidate_id}/delete', 'candidateController@deletecandidate');
    Route::post('/candidate/managements/{candidate_id}/updateinterview', 'candidateController@updatecandidate');
    Route::post('/candidate/managements/search', 'candidateController@search');
    Route::get('/hrd', 'UtilityController@index');

    // ROUTE TAMBAH UTILITAS HRD
    Route::post('/utility/kota/addnew', 'UtilityController@kotaaddnew');
    Route::post('/utility/suku/addnew', 'UtilityController@sukuaddnew');
    Route::post('/utility/agama/addnew', 'UtilityController@agamaaddnew');
    Route::post('/utility/lowongan/addnew', 'UtilityController@lowonganaddnew');
    Route::post('/utility/kotadomisili/addnew', 'UtilityController@kotadomisiliaddnew');
    Route::post('/utility/kelurahan/addnew', 'UtilityController@kelurahanaddnew');
    Route::post('/utility/kecamatan/addnew', 'UtilityController@kecamatanaddnew');

    // ROUTE DELETE UTILITAS HRD
    Route::get('hrd/{city_id}/delete/deletedatakota', 'UtilityController@deletekota');
    Route::get('hrd/{nama_suku}/delete/deletedatasuku', 'UtilityController@deletesuku');
    Route::get('hrd/{religion_id}/delete/deletedataagama', 'UtilityController@hapusagama');
    Route::get('hrd/{loker_id}/delete/deletedatalowongan', 'UtilityController@deleteloker');
    Route::get('hrd/{id}/deletedomisili', 'UtilityController@deletedomisili');
    Route::get('hrd/{id}/deletekelurahan', 'UtilityController@deletekelurahan');
    Route::get('hrd/{id}/deletekecamatan', 'UtilityController@deletekecamatan');
});
Route::group(['middleware' => ['auth', 'roleCheck:head,hrd,administrator']], function () {
    route::get('/candidate/managements', 'candidateController@managements');
    Route::get('/candidate/managements/{candidate_id}/view', 'candidateController@viewcandidate');
    Route::get('/candidate/managements/{candidate_id}/delete', 'candidateController@deletecandidate');
    Route::get('/candidate/managements/{candidate_id}/updateinterview', 'candidateController@updatecandidate');
    Route::post('/candidate/managements/search', 'candidateController@search');
});

Route::group(['middleware' => ['auth', 'roleCheck:head,user,it,administrator,umum,hrd']], function () {
    Route::get('/queue', 'issueController@index');
    Route::get('/quote-request', 'QuoteController@index');
    Route::get('/quote-published', 'QuoteController@published')->name('quotepublish');
    Route::post('/quote/addnew', 'QuoteController@addnew');
    Route::post('/queue/addnew', 'issueController@addnewissue');

    Route::get('/itCheck', 'issueController@itCheck');
    Route::get('/headCheck', 'issueController@headCheck');
    Route::get('/itSolved', 'issueController@itSolved');
    Route::get('/quote/selesai/{quote_id}', 'QuoteController@formselesai');

    Route::post('/itCheck/selesai/{id}', 'issueController@selesai');
    Route::post('/quote/{quote_id}/update', 'QuoteController@formupdate');
    Route::post('/itCheck/sementara/{id}', 'issueController@sementara');
    Route::post('/itCheck/batal/{id}', 'issueController@batal');

    Route::post('/headCheck/approve/{id}', 'issueController@approve');
    Route::post('/headCheck/abort/{id}', 'issueController@abort');

    Route::get('/quote/{quote_id}/delete', 'QuoteController@deletequote');
});

// Route For Warning Letter
Route::group(['middleware' => ['auth', 'roleCheck:head,it,administrator,hrd']], function () {
    Route::get('/warning-notice', 'WarningController@index');
    Route::post('/notice/addnew', 'WarningController@requestnew');
    Route::post('/approve-warning-notice/{id}', 'WarningController@approve');
    Route::post('/checked-by-hrd/{id}', 'WarningController@confirmed');
});

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/gallery', 'DashController@gallery');
    Route::get('/delivery-sys', 'DashController@deliver');
    Route::get('/blog', 'DashController@blog');

    // Tambah item galeri
    Route::get('/gallery/add-album', 'DashController@addalbum')->name('view.album');
    Route::post('/gallery/add-album', 'DashController@prosesalbum')->name('proses.album');

    // Blog
    Route::get('/blog/add-blog', 'DashController@addblog')->name('view.blog');
    Route::post('/blog/add-blog', 'DashController@prosesblog')->name('proses.blog');
    Route::get('/blog/trash/{id}', 'DashController@trashblog');

    // Delivery-SYS
    Route::post('/delivery-sys/add-new-order', 'DashController@addorder')->name('add.order');
    Route::post('/delivery-sys/add-new-tracking/{order_id}', 'DashController@addnewtrack');
    Route::post('/delivery-sys/update-transit-tracking/{order_id}', 'DashController@updatetransit');
});
Route::get('/get-profiles', 'DashController@getprofiles');
