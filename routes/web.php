<?php

use App\Http\Controllers\Account\SettingsController;
use App\Http\Controllers\ParameterMasterController;
use App\Http\Controllers\Auth\SocialiteLoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Documentation\LayoutBuilderController;
use App\Http\Controllers\Documentation\ReferencesController;
use App\Http\Controllers\Logs\AuditLogsController;
use App\Http\Controllers\Logs\SystemLogsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Identity\CustomerController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
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

// Route::get('/', function () {
//     return redirect('index');
// });

$menu = theme()->getMenu();
array_walk($menu, function ($val) {
    if (isset($val['path'])) {
        $route = Route::get($val['path'], [PagesController::class, 'index']);

        // Exclude documentation from auth middleware
        if (!Str::contains($val['path'], 'documentation')) {
            $route->middleware('auth');
        }

        // Custom page demo for 500 server error
        if (Str::contains($val['path'], 'error-500')) {
            Route::get($val['path'], function () {
                abort(500, 'Something went wrong! Please try again later.');
            });
        }
    }
});

// Documentations pages
Route::prefix('documentation')->group(function () {
    Route::get('getting-started/references', [ReferencesController::class, 'index']);
    Route::get('getting-started/changelog', [PagesController::class, 'index']);
    Route::resource('layout-builder', LayoutBuilderController::class)->only(['store']);
});

Route::middleware('auth')->group(function () {
    // Account pages
    Route::prefix('account')->group(function () {
        Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
        Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');
        Route::put('settings/email', [SettingsController::class, 'changeEmail'])->name('settings.changeEmail');
        Route::put('settings/password', [SettingsController::class, 'changePassword'])->name('settings.changePassword');
    });
    // //profile pages
    Route::prefix('identity')->group(function () {
        Route::get('profile', [CustomerController::class, 'index'])->name('profile.index');
        Route::get('profile/trash', [CustomerController::class, 'trash'])->name('profile.trash');
        Route::get('profile/create', [CustomerController::class, 'create'])->name('profile.create');
        Route::post('profile/store', [CustomerController::class, 'store'])->name('profile.store');
        Route::get('profile/edit/{id}', [CustomerController::class, 'edit'])->name('profile.edit');
        Route::put('profile/update/{id}', [CustomerController::class, 'update'])->name('profile.update'); // Change to PUT
        Route::delete('profile/destroy/{id}', [CustomerController::class, 'destroy'])->name('profile.destroy');
        Route::delete('/profile/forceDelete/{id}', [CustomerController::class, 'forceDelete'])->name('profile.forceDelete');
        Route::patch('profile/restore/{id}', [CustomerController::class, 'restore'])->name('profile.restore');
    });
    // //roles
    Route::get('roles', [RolesController::class, 'index'])->name('roles.index');

    Route::get('create_role', [RolesController::class, 'create'])->name('create_role');
    Route::post('add_role', [RolesController::class, 'store'])->name('add_role');
    Route::get('edit_role/{id}', [RolesController::class, 'edit'])->name('edit_role');
    Route::post('update_role/{id}', [RolesController::class, 'update'])->name('update_role');
    Route::delete('role/destroy/{id}', [RolesController::class, 'destroy'])->name('role.destroy');
    Route::get('role/view/{id}', [RolesController::class, 'view'])->name('role.view');

    // //users
    Route::resource('users', UsersController::class)->only(['index', 'destroy']);
    Route::get('create_user', [UsersController::class, 'create'])->name('create_user');
    Route::post('add_user', [UsersController::class, 'store'])->name('add_user');
    Route::get('edit_user/{id}', [UsersController::class, 'edit'])->name('edit_user');
    Route::post('update_user/{id}', [UsersController::class, 'update'])->name('update_user');
    Route::delete('user/destroy/{id}', [UsersController::class, 'destroy'])->name('user.destroy');
    Route::get('user/view/{id}', [UsersController::class, 'view'])->name('user.view');

    //Parameter Master
    Route::resource('parameters', ParameterMasterController::class)->only(['index']);

    Route::get('parameter', [ParameterMasterController::class, 'index'])->name('parameter.index');
    Route::get('create_parameter', [ParameterMasterController::class, 'create'])->name('create_parameter');
    Route::post('add_parameter', [ParameterMasterController::class, 'store'])->name('add_parameter');
    Route::get('edit_parameter/{id}', [ParameterMasterController::class, 'edit'])->name('edit_parameter');
    Route::put('update_parameter/{id}', [ParameterMasterController::class, 'update'])->name('update_parameter');
    Route::get('paramter/view/{id}', [ParameterMasterController::class, 'view'])->name('parameter.view');

    //Category
    Route::resource('categories', CategoryController::class)->only(['index']);

    Route::get('category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('create_category', [CategoryController::class, 'create'])->name('create_category');
    Route::post('add_category', [CategoryController::class, 'store'])->name('add_category');
    Route::get('edit_category/{id}', [CategoryController::class, 'edit'])->name('edit_category');
    Route::put('update_category/{id}', [CategoryController::class, 'update'])->name('update_category');
    Route::delete('category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    // Logs pages
    Route::prefix('log')->name('log.')->group(function () {
        Route::resource('system', SystemLogsController::class)->only(['index', 'destroy']);
        Route::resource('audit', AuditLogsController::class)->only(['index', 'destroy']);
    });
});

Route::resource('users', UsersController::class);

/**
 * Socialite login using Google service
 * https://laravel.com/docs/8.x/socialite
 */
Route::get('/auth/redirect/{provider}', [SocialiteLoginController::class, 'redirect']);

require __DIR__ . '/auth.php';

//profile
