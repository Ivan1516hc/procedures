<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeneficiaryController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\CrecheController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\RequestsController;
use App\Http\Controllers\ResetPasswordController;
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

Route::middleware('cors')->group(function () {
    // Ruta para enviar el correo electrónico de restablecimiento de contraseña
    Route::post('password/reset', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');


    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

    Route::group([
        'middleware' => 'api',
        'prefix' => 'auth'
    ], function ($router) {
        // Rutas para mostrar y procesar el formulario de restablecimiento de contraseña
        Route::post('password/reset/{token}', [ResetPasswordController::class, 'reset'])->name('password.update');

        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/register', [AuthController::class, 'register']);
        
        //VALIDAR TOKEN
        Route::get('/validate', [AuthController::class, 'validarToken']);

        Route::middleware('jwt.verify')->group(function () {
            Route::post('/logout', [AuthController::class, 'logout']);
            Route::post('/refresh', [AuthController::class, 'refresh']);
            Route::get('/user-profile', [AuthController::class, 'userProfile']);
        });
    });

    Route::middleware('jwt.verify')->group(function () {
        //Requests
        Route::get('request', [RequestsController::class, 'index']);
        Route::post('request/create',[RequestsController::class,'store']); //Pendiente
        Route::put('request/update',[RequestsController::class,'update']);

        Route::get('quote', [QuoteController::class, 'index']);
        Route::post('quote/create',[QuoteController::class,'store']);
        Route::put('quote/update',[QuoteController::class,'update']);
        
        Route::get('creche', [CrecheController::class, 'index']);
        Route::get('creche/request/{center}/{degree}',[CrecheController::class,'showCreche']);
        Route::get('creche/beneficiaries/{creche}',[CrecheController::class,'showBeneficiaryCreche']);

        Route::post('creche/beneficiary/create',[BeneficiaryController::class,'beneficiaryCreche']);
        Route::put('creche/beneficiary/update',[BeneficiaryController::class,'updateBeneficiaryCreche']);
        
        Route::get('beneficiary', [BeneficiaryController::class, 'index']);

        //visitor
        Route::get('center/procedure/{procedure}',[CenterController::class,'showForProcedure']);
        Route::get('center/creche/{creche}',[CenterController::class,'showCreche']);
        Route::post('creche/request/create',[RequestsController::class,'store']);
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
