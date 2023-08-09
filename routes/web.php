<?php
use App\Http\Controllers\registerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductController;



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

// Route::get('/', function () {
//     return view('welcome');
// });
//pour administrateur
Route::get('admin',[registerController::class, "adminregister"]);
Route::post('adminStore',[registerController::class, "adminStore"])->name('admin.store');
//pour le manager
Route::get('manager',[registerController::class, "managerregister"])->name('gerant');
Route::post('managerStore',[registerController::class, "managerStore"])->name('manager.store');
//  pour le client
Route::get('client',[registerController::class, "clientregister"]);
Route::post('clientStore',[registerController::class, "clientStore"])->name('client.store');
//pour connexion
Route::get('login',[logincontroller::class, "loginpage"]);
Route::post('loginStore',[logincontroller::class, "loginStore"])->name('login.store');
//products

Route::get('/products',[logincontroller::class, "homepage"]);

Route::resource('products', ProductController::class);

Route::get('/',[registerController::class, "home"]);

//deconexion
 Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
    
 });
 Route::get('/logout',[LogoutController::class, "perform"])->name('logout.perform');
