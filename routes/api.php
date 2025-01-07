<?php

use App\Http\Controllers\admin\AboutSchollController;
use App\Http\Controllers\admin\AxborotPostController;
use App\Http\Controllers\admin\Category\AxborotCategory;
use App\Http\Controllers\admin\Category\OqituvchilarCategory;
use App\Http\Controllers\admin\Category\RahbariyatController;
use App\Http\Controllers\admin\Category\TalimCategory;
use App\Http\Controllers\admin\ClearController;
use App\Http\Controllers\admin\DeleteTableController;
use App\Http\Controllers\admin\RequestController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\admin\TalimPostController;

use App\Http\Controllers\admin\WorkerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DatabaseSizeController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TelegramController;
use App\Http\Controllers\UserController;
use App\Models\AxborotPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;





/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Login route only for POST requests (auth middleware not used here)
Route::post('login', [LoginController::class, 'loginis'])->name('login');


// Auth middleware applied only to protected routes (no login check here)
Route::middleware(['auth:sanctum', 'verified'])->group(function() {
});
      // Category Start
      Route::resource('rahbariyatCategory', RahbariyatController::class); 
      Route::resource('oqituvchilar', OqituvchilarCategory::class);
      // Category End
      
      // Worker start
      Route::resource('worker', WorkerController::class);
      // Worker End
      
      // About School start
      Route::apiResource('aboutSchool', AboutSchollController::class);
      // About School End
      
      // talim start
      Route::resource('talimCategory', TalimCategory::class);
      Route::resource('talimPost', TalimPostController::class);
      // talim end
    //   Axborat Start
    Route::resource('axborotCategory', AxborotCategory::class);
    Route::resource('axborotPost', AxborotPostController::class);
    // Axborot End
    // sttingis start
    Route::get('settings', [SettingsController::class, 'index']);
   Route::delete('clear/{table}', [ClearController::class, 'clear']);
   Route::get('database-size', [DatabaseSizeController::class, 'database']);
   Route::get('request', [RequestController::class, 'index']);
  


// front start

Route::get('rahbariyat', [FrontController::class, 'rahbariyat']);
Route::get('rahbariyat/{id}', [FrontController::class, 'rahbariyats']);
Route::get('teachers', [FrontController::class, 'teachers']);
Route::get('teachers/{id}', [FrontController::class, 'show_teachers']);
Route::get('ishchilar', [FrontController::class, 'workers']);
Route::get('ishchilar/{id}', [FrontController::class, 'workers_id']);
Route::get('talimCategory', [FrontController::class, 'talimCategory']);
Route::get('talimPost', [FrontController::class, 'talimPost']);
Route::get('talimPost/{id}', [FrontController::class, 'talimPostId']);
Route::get('axborotCategory', [FrontController::class, 'axborot']);
Route::get('axborotCategory/{id}', [FrontController::class, 'axborotid']);
Route::get('axborotPost', [FrontController::class, 'axborotPost']);

Route::post('contact', [TelegramController::class, 'sendMessage']);
//
Route::get('search', [SearchController::class, 'search']);

// front end