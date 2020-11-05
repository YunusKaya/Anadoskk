<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homepage;
use App\Http\Controllers\back\AuthController;
use App\Http\Controllers\back\Dashboard;
use App\Http\Controllers\back\PagesController;
use App\Http\Controllers\back\ReportController;
use App\Http\Controllers\back\SubtextController;
use App\Http\Controllers\back\TitleController;
use App\Http\Controllers\back\WriterController;


/*
|---------------------------------------------------------------
| Admin Routes
|---------------------------------------------------------------
*/
Route::get('cikis',[AuthController::class,'logout'])->name('login.logout');

Route::prefix('/')->name('login.')->middleware('isLogin')->group(function ()
{
    Route::get('login',[AuthController::class,'login'])->name('index');
    Route::post('login',[AuthController::class,'loginPost'])->name('index.post');
});

Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function ()
{
    Route::get('panel', [Dashboard::class,'index'])->name('dashboard');
    //|
    //-----------------------Title Routes---------------------------
    Route::resource('dagcilik',TitleController::class);
    Route::post('delete',[TitleController::class,'delete'])->name('dagcilik.delete');
    //|
    //-----------------------SubText Routes---------------------------
    Route::resource('altmetin',SubtextController::class);
    //-----------------------Rapor Routes---------------------------
    Route::get('raporlar',[ReportController::class,'index'])->name('report.index');
    Route::post('rapor/create',[ReportController::class,'create'])->name('report.create');
    Route::get('rapor/getData',[ReportController::class,'getData'])->name('report.getData');
    Route::post('rapor/update',[ReportController::class,'update'])->name('report.update');
    Route::post('rapor/delete',[ReportController::class,'delete'])->name('report.delete');
    //-----------------------Pages Routes---------------------------
    Route::resource('yazilar',PagesController::class);
    Route::post('yazilar/delete',[PagesController::class,'delete'])->name('yazilar.delete');


    //---------------------------------------------------------------


});

/*
|---------------------------------------------------------------
| Writer Routes
|---------------------------------------------------------------
*/

Route::prefix('writer')->name('writer.')->middleware('isWriter')->group(function ()
{
    Route::get('panel',[WriterController::class,'dashboard'])->name('panel.dashboard');


});


/*
|---------------------------------------------------------------
| Front Routes
|---------------------------------------------------------------
*/


Route::prefix('Kullanici')->name('my.')->middleware('isUser')->group(function ()
{
    Route::get('/Bilgilerim',[Homepage::class,'myinfo'])->name('info');
    Route::post('/image/post',[Homepage::class,'ImagePost'])->name('image.post');
    Route::post('/info/post',[Homepage::class,'myInfoPost'])->name('info.post');
    Route::get('Sifre',[Homepage::class,'getpassword'])->name('get.password');
    Route::post('sifre/post',[Homepage::class,'getpasswordpost'])->name('get.password.post');
    Route::get('Beğendiklerim',[Homepage::class,'getlike'])->name('get.like');
    Route::get('Takip/Ettiklerim',[Homepage::class,'follow'])->name('follow');
    Route::get('Takip/Unfollow/{slug}',[Homepage::class,'unfollow'])->name('unfollow');


});

Route::get('/', [Homepage::class,'index'])->name('home');
Route::get('/dagcilik',[Homepage::class,'dagcilik'])->name('dagcilik');
Route::get('/makaleler',[Homepage::class,'article'])->name('article');
Route::get('/faliyet-raporları',[Homepage::class,'rapor'])->name('rapor');
Route::get('/yazilar',[Homepage::class,'yazilar'])->name('yazilar');
Route::get('/iletisim',[Homepage::class,'iletisim'])->name('iletisim');
Route::post('/iletisim',[Homepage::class,'contactpost'])->name('contactpost');
Route::get('/Yazarlar',[Homepage::class,'writer'])->name('writers');
Route::get('/Yazarlar/Profil/{slug}',[Homepage::class,'writer_profiles'])->name('writer.profiles');

Route::get('/{categorySlug}',[Homepage::class,'category'])->name('category');
Route::get('single/{slug}/{id}',[Homepage::class,'single'])->name('single');
Route::get('makaleler/{slug},{status}',[Homepage::class,'likedislike'])->name('like.dislike');
Route::get('/makaleler/{slug}',[Homepage::class,'articledetail'])->name('article.detail');
