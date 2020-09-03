<?php

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
Route::resource('users', 'User\UserController', ['except' => ['create', 'edit']]);
Route::name('verify')->get('user/verify/{token}', 'User\UserController@verify');

Route::resource('volunteers', 'Volunteer\VolunteerController', ['only' => ['index', 'show']]);
Route::resource('supporters', 'Supporter\SupporterController', ['only' => ['index', 'show']]);
Route::resource('members', 'Member\MemberController', ['only' => ['index', 'show']]);
Route::resource('provinces', 'Province\ProvinceController', ['only' => ['index', 'show']]);
Route::resource('municipalities', 'Municipality\MunicipalityController', ['only' => ['index', 'show']]);
Route::resource('areas', 'Area\AreaController', ['only' => ['index', 'show']]);
Route::resource('wards', 'Ward\WardController', ['only' => ['index', 'show']]);
Route::resource('stations', 'Station\StationController', ['only' => ['index', 'show']]);
Route::resource('membership-plans', 'MembershipPlan\MembershipPlanController', ['except' => ['create', 'edit']]);
Route::resource('memberships', 'Membership\MembershipController', ['only' => ['index', 'show']]);
Route::resource('transactions', 'Transaction\TransactionController', ['only' => ['index', 'show']]);


