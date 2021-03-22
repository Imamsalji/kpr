
<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// login & register
Route::middleware('guest')->group(function () {
    // user landing page
    Route::get('/', function () {
        return view('index');
    });
    Route::get('/register', function () {
        return view('auth.register');
    });
    Route::get('/login', function () {
        return view('auth.login');
    });
    Route::prefix('user')->namespace('User')->name('user.')->group(function () {
        Route::get('/register', 'RegisterUser@index')->name('register');
    });
});

Auth::routes(['verify' => true]);

Route::get('/pinjaman', 'UserController@pinjaman')->name('user.pinjaman.index');

Route::middleware('auth')->group(function () {
    // dashboard
    Route::get('/home', 'HomeController@index')->name('home');
    // profil user
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/setting', 'UserController@edit')->name('setting');
        Route::patch('/setting/update', 'UserController@update')->name('update');
    });
    // change password
    Route::prefix('account')->name('password.')->group(function () {
        Route::get('/password', 'UserController@changePassword')->name('edit');
        Route::patch('/password', 'UserController@updatePassword')->name('edit');
    });
    // admin
    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function () {
        // management account
        Route::prefix('account')->name('account.')->group(function () {
            // per view & role
            Route::get('/admin', 'AccountController@admin_index_account')->name('admin');
            Route::get('/user', 'AccountController@user_index_account')->name('customer');
            Route::get('/pengelola', 'AccountController@pengelola_index_account')->name('pengelola');
            Route::patch('/updaterole/{id}', 'AccountController@update_role')->name('updaterole');
            // register account
            Route::resource('register', 'AccountController');
            Route::get('/verifikasi', 'AccountController@verifikasi_index_account')->name('verifikasi');
            Route::patch('/verified/{id}', 'AccountController@verified')->name('verified');
            Route::get('/user/export/excel', 'AccountController@userExportExcel')->name('user.export.excel');
            Route::get('/user/export/pdf', 'AccountController@userExportPdf')->name('user.export.pdf');
        });
        Route::prefix('rekapdata')->name('rekapdata.')->group(function () {
            Route::get('/Bulan', 'RekapdataController@getBulan')->name('bulan');
            Route::get('/Tahun', 'RekapdataController@getTahun')->name('tahun');
        });
        Route::prefix('detaildata')->name('detaildata.')->group(function () {
            Route::get('/AngsuranKe', 'DetaildataController@getAngsuranKe')->name('angsuranke');
            Route::get('/Pokok', 'DetaildataController@getPokok')->name('pokok');
            Route::get('/Bunga', 'DetaildataController@getBunga')->name('bunga');
            Route::get('/BesarAngsuran', 'DetaildataController@getBesarAngsuran')->name('besarangsuran');
            Route::get('/SisaAngsuran', 'DetaildataController@getSisaAngsuran')->name('sisaangsuran');
            Route::get('/{pinjam}', 'DetaildataController@getindex')->name('pinjam');
            Route::put('/status/{pinjam}', 'DetaildataController@statusupdate')->name('status');
            Route::put('/decline/{pinjam}', 'DetaildataController@statusdecline')->name('statusdecline');
            Route::post('/status/{id}', 'DetaildataController@cari')->name('carinama');
            Route::get('/show/{id}', 'DetaildataController@show')->name('show');
        });
        Route::prefix('pinjaman')->name('pinjaman.')->group(function () {
            Route::get('/', 'DetaildataController@pengajuan')->name('pinjaman');
        });

        Route::resource('pangkat', 'PangkatController');
        Route::get('/search', 'AccountController@seacrh')->name('search');
    });
    Route::get('/kalkulator', 'HomeController@kalkulator')->name('kalkulator');
    Route::post('/hitung' , 'HomeController@hitung')->name('hitung');
});
