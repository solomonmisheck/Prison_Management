<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();


//USER ROUTES
Route::middleware(['auth'])->group(function (){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/', [App\Http\Controllers\UserDashboardController::class, 'index']);
    Route::get('inmates', [App\Http\Controllers\UserDashboardController::class, 'inmates']);
    Route::get('inmates/view/{id}', [App\Http\Controllers\UserDashboardController::class, 'viewInmate']);
    Route::get('health_records', [App\Http\Controllers\UserDashboardController::class, 'inmateHealthRecords']);
    Route::get('inmate/view/health_record/{id}', [App\Http\Controllers\UserDashboardController::class, 'viewInmateHealthRecord']);
    Route::get('visits', [App\Http\Controllers\UserDashboardController::class, 'inmeateVisits']);

    //REQUESTS ROUTES
    Route::get('requests', [App\Http\Controllers\RequestController::class, 'index']);
    Route::get('add-request', [App\Http\Controllers\RequestController::class, 'create']);
    Route::post('add-request', [App\Http\Controllers\RequestController::class, 'store']);
    Route::get('edit-request/{id}', [App\Http\Controllers\RequestController::class, 'edit']);
    Route::put('edit-request/{id}', [App\Http\Controllers\RequestController::class, 'update']);
    Route::get('delete-request/{id}', [App\Http\Controllers\RequestController::class, 'destroy']);
});



Route::prefix('minister')->middleware(['auth','IsMinister'])->group(function (){
    Route::get('/', [App\Http\Controllers\Minister\DashboardController::class, 'index']);
    Route::get('inmates', [App\Http\Controllers\Minister\DashboardController::class, 'inmates']);
    Route::get('inmate/view/{id}', [App\Http\Controllers\Minister\DashboardController::class, 'viewInmate']);
    Route::get('health_records', [App\Http\Controllers\Minister\DashboardController::class, 'inmateHealthRecords']);
    Route::get('inmate/view/health_record/{id}', [App\Http\Controllers\Minister\DashboardController::class, 'viewInmateHealthRecord']);
    Route::get('visits', [App\Http\Controllers\Minister\DashboardController::class, 'inmeateVisits']);
});

Route::prefix('lawyer')->middleware(['auth','IsLawyer'])->group(function (){
    Route::get('/', [App\Http\Controllers\Lawyer\DashboardController::class, 'index']);
    Route::get('inmates', [App\Http\Controllers\Lawyer\DashboardController::class, 'inmates']);
    Route::get('inmate/view/{id}', [App\Http\Controllers\Lawyer\DashboardController::class, 'viewInmate']);
    Route::get('health_records', [App\Http\Controllers\Lawyer\DashboardController::class, 'inmateHealthRecords']);
    Route::get('inmate/view/health_record/{id}', [App\Http\Controllers\Lawyer\DashboardController::class, 'viewInmateHealthRecord']);
    Route::get('visits', [App\Http\Controllers\Lawyer\DashboardController::class, 'inmeateVisits']);
});


Route::prefix('admin')->middleware(['auth','IsAdmin'])->group(function (){
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    //USER LIST
    Route::get('users', [App\Http\Controllers\UserController::class, 'index']);
    // Route::get('add-user', [App\Http\Controllers\UserController::class, 'create']);
    // Route::post('add-user', [App\Http\Controllers\UserController::class, 'store']);
    Route::get('edit-user/{id}', [App\Http\Controllers\UserController::class, 'edit']);
    Route::put('edit-user/{id}', [App\Http\Controllers\UserController::class, 'update']);
    Route::get('delete-user/{id}', [App\Http\Controllers\UserController::class, 'destroy']);

    //ROLES
    Route::get('roles', [App\Http\Controllers\RoleController::class, 'index']);

    //CELL BLOCKS ROUTES
    Route::get('cellblocks', [App\Http\Controllers\CellBlockController::class, 'index']);
    Route::get('add-cellblock', [App\Http\Controllers\CellBlockController::class, 'create']);
    Route::post('add-cellblock', [App\Http\Controllers\CellBlockController::class, 'store']);
    Route::get('edit-cellblock/{id}', [App\Http\Controllers\CellBlockController::class, 'edit']);
    Route::put('edit-cellblock/{id}', [App\Http\Controllers\CellBlockController::class, 'update']);
    Route::get('delete-cellblock/{id}', [App\Http\Controllers\CellBlockController::class, 'destroy']);

    //CRIME ROUTES
    Route::get('crime', [App\Http\Controllers\CrimeController::class, 'index']);
    Route::get('add-crime', [App\Http\Controllers\CrimeController::class, 'create']);
    Route::post('add-crime', [App\Http\Controllers\CrimeController::class, 'store']);
    Route::get('edit-crime/{id}', [App\Http\Controllers\CrimeController::class, 'edit']);
    Route::put('edit-crime/{id}', [App\Http\Controllers\CrimeController::class, 'update']);
    Route::get('delete-crime/{id}', [App\Http\Controllers\CrimeController::class, 'destroy']);

    //INMATE ROUTES
    Route::get('inmates', [App\Http\Controllers\InmateController::class, 'index']);
    Route::get('add-inmate', [App\Http\Controllers\InmateController::class, 'create']);
    Route::post('add-inmate', [App\Http\Controllers\InmateController::class, 'store']);
    Route::get('edit-inmate/{id}', [App\Http\Controllers\InmateController::class, 'edit']);
    Route::put('edit-inmate/{id}', [App\Http\Controllers\InmateController::class, 'update']);
    Route::get('transfer-inmate/{id}', [App\Http\Controllers\InmateController::class, 'transfer']);
    Route::put('transfer-inmate/{id}', [App\Http\Controllers\InmateController::class, 'transferInmate']);
    Route::get('delete-inmate/{id}', [App\Http\Controllers\InmateController::class, 'destroy']);

    //VISIT ROUTES
    Route::get('visits', [App\Http\Controllers\VisitController::class, 'index']);
    Route::get('add-visit', [App\Http\Controllers\VisitController::class, 'create']);
    Route::post('add-visit', [App\Http\Controllers\VisitController::class, 'store']);
    Route::get('edit-visit/{id}', [App\Http\Controllers\VisitController::class, 'edit']);
    Route::put('edit-visit/{id}', [App\Http\Controllers\VisitController::class, 'update']);
    Route::get('delete-visit/{id}', [App\Http\Controllers\VisitController::class, 'destroy']);

    //DISEASES ROUTES
    Route::get('diseases', [App\Http\Controllers\DiseaseController::class, 'index']);
    Route::get('add-disease', [App\Http\Controllers\DiseaseController::class, 'create']);
    Route::post('add-disease', [App\Http\Controllers\DiseaseController::class, 'store']);
    Route::get('edit-disease/{id}', [App\Http\Controllers\DiseaseController::class, 'edit']);
    Route::put('edit-disease/{id}', [App\Http\Controllers\DiseaseController::class, 'update']);
    Route::get('delete-disease/{id}', [App\Http\Controllers\DiseaseController::class, 'destroy']);

    //HEALTH RECORD ROUTES
    Route::get('health_records', [App\Http\Controllers\HealthRecordController::class, 'index']);
    Route::get('add-health_record', [App\Http\Controllers\HealthRecordController::class, 'create']);
    Route::post('add-health_record', [App\Http\Controllers\HealthRecordController::class, 'store']);
    Route::get('edit-health_record/{id}', [App\Http\Controllers\HealthRecordController::class, 'edit']);
    Route::put('edit-health_record/{id}', [App\Http\Controllers\HealthRecordController::class, 'update']);
    Route::get('delete-health_record/{id}', [App\Http\Controllers\HealthRecordController::class, 'destroy']);

    //Requests
    Route::get('pending_requests', [App\Http\Controllers\RequestController::class, 'pendingRequests']);
    Route::get('approved_requests', [App\Http\Controllers\RequestController::class, 'approvedRequests']);
    Route::get('rejected_requests', [App\Http\Controllers\RequestController::class, 'rejectedRequests']);

    Route::get('reject-request/{id}', [App\Http\Controllers\RequestController::class, 'rejectRequest']);
    Route::get('approve-request/{id}', [App\Http\Controllers\RequestController::class, 'approveRequest']);
});