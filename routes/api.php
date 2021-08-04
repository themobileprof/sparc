<?php
use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
    //return $request->user();
//});

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
	Route::resource('countries', CountryAPIController::class);

	Route::resource('context_entries', ContextEntryAPIController::class);

	Route::resource('component_entries', ComponentEntryAPIController::class);

	Route::resource('sponsors', SponsorAPIController::class);

	Route::resource('purchasing_functions', PurchasingFunctionAPIController::class);

	Route::post('/auth/logout', [AuthController::class, 'logout']);
});
