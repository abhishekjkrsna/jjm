<?php

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Utilities\ProjectController;
use App\Http\Controllers\Utilities\VerticalController;
use App\Http\Controllers\Utilities\TeamController;
use App\Http\Controllers\Utilities\RoleController;
use App\Http\Controllers\Utilities\UserController;
use App\Http\Controllers\Utilities\VendorController;
use App\Http\Controllers\Utilities\VendorAssociation;
use App\Http\Controllers\Utilities\TeamMemberController;
use App\Http\Controllers\VendorusersController;
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

Route::get('logout', function () {
    Session::flush();
    Auth::logout();
    return redirect('/');
});

Route::group(['prefix' => '/vendor'], function () {
    Route::controller(VendorusersController::class)->group(function () {
        Route::get('/', 'index')->name('login');
        Route::post('/login', 'login')->name('vendor.login');
        Route::get('/register', 'register')->name('vendor.register');
        Route::get('/logout', 'logout')->name('logout');
    });
});


Route::get('/', function () {
    return view('mainpage');
});

Auth::routes();

Route::group(['prefix' => '/dashboard'], function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('dashboard');
        Route::get('/add-role', 'addRole')->name('addRole');
        Route::get('/add-project', 'addProject')->name('addProject');
        Route::get('/add-user', 'addUser')->name('addUser');
        Route::get('/add-vertical', 'addVertical')->name('addVertical');
        Route::get('/add-vendor', 'addVendor')->name('addVendor');
        Route::get('/add-team', 'addTeam')->name('addTeam');
        Route::get('/add-member', 'addMember')->name('addMember');
        Route::get('/associate-vendor', 'associateVendor')->name('associateVendor');
    });
});


Route::group(['prefix' => 'api'], function () {
    Route::get('/user', function () {
        return Auth::user();
    })->name('user');

    Route::group(['prefix' => '/project'], function () {
        Route::controller(ProjectController::class)->group(function () {
            Route::post('/add', 'addProject')->name('addProject');
            Route::get('/all', 'allProjects')->name('allProjects');
            Route::get('/{id}', 'getProject')->where('id', '\d+')->name('getProject');
            Route::delete('/delete/{id}', 'deleteProject')->where('id', '\d+')->name('deleteProject');
            Route::put('/update/{id}', 'updateProject')->where('id', '\d+')->name('updateProject');
        });
    });
    Route::group(['prefix' => '/vertical'], function () {
        Route::controller(VerticalController::class)->group(function () {
            Route::post('/add', 'addVertical')->name('addVertical');
            Route::get('/all', 'allVerticals')->name('allProjects');
            Route::get('/{id}', 'getVertical')->where('id', '\d+')->name('getVertical');
            Route::delete('/delete/{id}', 'deleteVertical')->where('id', '\d+')->name('deleteVertical');
            Route::put('/update/{id}', 'updateVertical')->where('id', '\d+')->name('updateVertical');
        });
    });
    Route::group(['prefix' => '/team'], function () {
        Route::controller(TeamController::class)->group(function () {
            Route::post('/add', 'addTeam')->name('addTeam');
            Route::get('/all', 'allTeams')->name('allTeams');
            Route::get('/{id}', 'getTeam')->where('id', '\d+')->name('getTeam');
            Route::delete('/delete/{id}', 'deleteTeam')->where('id', '\d+')->name('deleteTeam');
            Route::put('/update/{id}', 'updateTeam')->where('id', '\d+')->name('updateTeam');
        });
    });
    Route::group(['prefix' => '/role'], function () {
        Route::controller(RoleController::class)->group(function () {
            Route::post('/add', 'addRole')->name('addRole');
            Route::get('/all', 'allRoles')->name('allRoles');
            Route::get('/{id}', 'getRole')->where('id', '\d+')->name('getRole');
            Route::delete('/delete/{id}', 'deleteRole')->where('id', '\d+')->name('deleteRole');
            Route::put('/update/{id}', 'updateRole')->where('id', '\d+')->name('updateRole');
        });
    });
    Route::group(['prefix' => '/user'], function () {
        Route::controller(UserController::class)->group(function () {
            Route::post('/add', 'addUser')->name('addUser');
            Route::get('/all', 'allUsers')->name('allUsers');
            Route::get('/{id}', 'getUser')->where('id', '\d+')->name('getUser');
            Route::delete('/delete/{id}', 'deleteUser')->where('id', '\d+')->name('deleteUser');
            Route::put('/update/{id}', 'updateUser')->where('id', '\d+')->name('updateUser');
        });
    });
    Route::group(['prefix' => '/vendor'], function () {
        Route::controller(VendorController::class)->group(function () {
            Route::post('/add', 'addVendor')->name('addVendor');
            Route::get('/all', 'allVendors')->name('allVendors');
            Route::get('/{id}', 'getVendor')->where('id', '\d+')->name('getVendor');
            Route::delete('/delete/{id}', 'deleteVendor')->where('id', '\d+')->name('deleteVendor');
            Route::put('/update/{id}', 'updateVendor')->where('id', '\d+')->name('updateVendor');
        });
    });
    Route::group(['prefix' => '/associate-vendor'], function () {
        Route::controller(VendorAssociation::class)->group(function () {
            Route::post('/add', 'addVaso')->name('addVaso');
            Route::get('/all', 'allVaso')->name('allVaso');
            Route::get('/{id}', 'getVaso')->where('id', '\d+')->name('getVaso');
            Route::delete('/delete/{id}', 'deleteVaso')->where('id', '\d+')->name('deleteVaso');
            Route::put('/update/{id}', 'updateVaso')->where('id', '\d+')->name('updateVaso');
        });
    });
    Route::group(['prefix' => '/team-member'], function () {
        Route::controller(TeamMemberController::class)->group(function () {
            Route::post('/add', 'addTm')->name('addTm');
            Route::get('/all', 'allTm')->name('allTm');
            Route::get('/{id}', 'getTm')->where('id', '\d+')->name('getTm');
            Route::delete('/delete/{id}', 'deleteTm')->where('id', '\d+')->name('deleteTm');
            Route::put('/update/{id}', 'updateTm')->where('id', '\d+')->name('updateTm');
            Route::get('/project/{id}', 'getProjectTeam')->where('id', '\d+')->name('getProjectTeam');
        });
    });
});
