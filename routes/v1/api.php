<?php

use App\Http\Controllers\v1\AllergenController;
use App\Http\Controllers\v1\AuthController;
use App\Http\Controllers\v1\DependantController;
use App\Http\Controllers\v1\EmergencyContactController;
use App\Http\Controllers\v1\FirstAidStepController;
use App\Http\Controllers\v1\InsightController;
use App\Http\Controllers\v1\MedicationController;
use App\Http\Controllers\v1\MedicationReminderController;
use App\Http\Controllers\v1\PatientController;
use App\Http\Controllers\v1\SymptomController;
use App\Http\Controllers\v1\TrackingController;
use App\Http\Resources\v1\MedicationReminderResource;
use App\Http\Resources\v1\PatientResource;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Post adalah untuk create
//get adalah untuk retrieve
//put adalah untuk update
//delete adalah untuk delete

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        // this use for display profile
        // user needed store and update //// PENDING
        Route::get('/me', [AuthController::class, 'me']);
        Route::put('/user/{user}', [AuthController::class, 'update']);
        Route::get('/patient', [PatientController::class, 'index']);
        Route::post('/patient/myAllergic', [PatientController::class, 'store']);

        // user done
        Route::get('/insight', [InsightController::class, 'index']);
        Route::get('/insight/{insight}', [InsightController::class, 'show']);

        // user done without store and update
        Route::get('/allergen', [AllergenController::class, 'index']);
        Route::get('/allergen/{allergen}', [AllergenController::class, 'show']);

        // user done
        Route::get('/medication', [MedicationController::class, 'index']);
        Route::get('/medication/{medication}', [MedicationController::class, 'show']);

        // user done
        Route::get('/symptom', [SymptomController::class, 'index']);
        Route::get('/symptom/{symptom}', [SymptomController::class, 'index']);

        // user done
        Route::get('/firstaidstep', [FirstAidStepController::class, 'index']);
        Route::get('/firstaidstep/{firstaidstep}', [FirstAidStepController::class, 'show']);

        // user needed store and update //// FAIL
        Route::get('/medicationreminder/{medicationreminder}', [MedicationReminderController::class, 'show']);
        Route::get('/medicationreminder', [MedicationReminderController::class, 'index']);
        Route::post('/medicationreminder', [MedicationReminderController::class, 'store']);
        Route::put('/medicationreminder/{medicationreminder}', [MedicationReminderController::class, 'update']);
        Route::delete('/medicationreminder/{medicationreminder}', [MedicationReminderController::class, 'delete']);

        // user needed store and update //// FAIL
        Route::get('/emergencycontact', [EmergencyContactController::class, 'index']);
        Route::get('/emergencycontact/{emergencycontact}', [EmergencyContactController::class, 'show']);
        Route::post('/emergencycontact', [EmergencyContactController::class, 'store']);
        Route::put('/emergencycontact/{emergencycontact}', [EmergencyContactController::class, 'update']);

        // user needed store and update //// FAIL
        Route::get('/tracking', [TrackingController::class, 'index']);
        Route::get('/tracking/{tracking}', [TrackingController::class, 'show']);
        Route::post('/tracking', [TrackingController::class, 'store']);
        Route::put('/tracking/{tracking}', [TrackingController::class, 'update']);

        // user done maybe
        Route::get('/dependant', [DependantController::class, 'index']);
        Route::get('/dependant/{dependant}', [DependantController::class, 'show']);
    });
