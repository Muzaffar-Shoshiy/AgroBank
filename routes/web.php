<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [FrontendController::class, 'welcome']);

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function(){
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/create-resume', [FrontendController::class, 'createCv']);
    Route::post('/create-resume', [FrontendController::class, 'storeCv']);
    Route::get('/my-resume', [FrontendController::class, 'displayCv']);
    Route::post('/my-resume/resume', [FrontendController::class, 'resume']);
    Route::get('/dashboard/forms', [DashboardController::class, 'forms']);
    Route::get('/dashboard/tables', [DashboardController::class, 'tables']);
    Route::get('/dashboard/view-employee/{id}', [DashboardController::class, 'viewEmployee']);
    Route::post('/dashboard/add-position', [DashboardController::class, 'addPosition']);
    Route::post('/dashboard/create-vacancy', [DashboardController::class, 'createVac']);
    Route::get('/dashboard/vacancies', [DashboardController::class, 'vacancies']);
    Route::get('/dashboard/vacancies/{id}', [DashboardController::class, 'vacancy']);
    Route::post('/respond', [FrontendController::class, 'respond']);
    Route::get('/view-vacancy/{id}', [FrontendController::class, 'displayVac']);
    Route::get('/my-responds', [FrontendController::class, 'myResponds']);
    Route::get('/search', [FrontendController::class, 'search']);
});
