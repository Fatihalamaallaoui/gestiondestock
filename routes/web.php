<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommandesController;
use App\Http\Controllers\EntrepotsController;
use App\Http\Controllers\TechniciensController;
use Illuminate\Support\Facades\Gate;

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


Route::get('/',function()
{
   return view('welcome');
});

Auth::routes();


 Route::group(['/home' => ['auth']], function () {


   Route::get('/home',[HomeController::class,'index']);
       Route::resource('produits', 'ProduitsController');
       Route::resource('categories', 'CategoriesController');
       Route::resource('commandes', 'CommandesController');
       Route::resource('users', 'UsersController');
       Route::resource('entrepots', 'EntrepotsController');
       Route::view('/produits/images/', '/produits/images/');

});


Route::get('/products/bycategory/{id}',[ProduitsController::class,'getbycategory'])->name('productbycat');

Route::get('/entrepots/bycity/{city}',[EntrepotsController::class,'getbycity'])->name('entrepotbycity');

Route::get('/print/commande/{idcmd}',[CommandesController::class,'printpdf'])->name('commandes.printcmd');

Route::any('/test',function(){
   dd('hi man');
})->name('test');

