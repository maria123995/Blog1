<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\Auth\LoginController;
// use App\Http\Controllers\Auth\RegisterController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::group(
//     [
//         'prefix' => LaravelLocalization::setLocale(),
//         'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
//     ], function () {

//     Route::namespace('Frontend')->middleware(['auth'])->group(function () {

//         Route::get('/',  [HomeController::class, 'index']);
//     });

// });

// Route::namespace('Frontend')->group(function () {

//             Route::get('/',  [HomeController::class, 'index']);
//         });



Route::namespace('Frontend')->group(function () {

    Route::get('/', 'HomeController@index')->name('home')->middleware('auth');


});

Route::get('/logout', 'Auth\LoginController@logout');
// Route::get('/admin',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
// Route::post('/admin',[LoginController::class,'adminLogin'])->name('admin.login');

// Route::get('/admin/register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
// Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/admin/dashboard',function(){
//     return view('admin');
// })->middleware('auth:admin');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('ad','Auth\CustomAuthController@index')->middleware('CheckGurd');
