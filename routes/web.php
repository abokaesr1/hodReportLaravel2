<?php

use App\Http\Controllers\Auth\FrontAuthController;
use App\Http\Controllers\Front_End\DataTableController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FrontAuthController::class,'user_auth_login'])->name('login');
Route::post('/login', [FrontAuthController::class,'post_user_auth_login'])->name('loginpost');
Route::get('/logout', [FrontAuthController::class,'post_user_auth_logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',[FrontAuthController::class,'dashboard'])->name('dashboard');
    Route::get('/view-new-user', [FrontAuthController::class,'view_new_user'])->name('user.view');
    Route::get('/add-new-user', [FrontAuthController::class,'add_new_user'])->name('user.add');
    Route::get('/add-role-user', [FrontAuthController::class,'add_role_user'])->name('user_role.add');
    Route::get('/add-group-user', [FrontAuthController::class,'add_group_user'])->name('user_group.add');
    // add
    Route::post('post/add-new-user', [FrontAuthController::class,'post_add_new_user'])->name('post_user.add');
    Route::post('post/add-role-user', [FrontAuthController::class,'post_add_role_user'])->name('post_user_role.add');
    Route::post('post/add-group-user', [FrontAuthController::class,'post_add_group_user'])->name('post_user_group.add');
    // edit
    Route::get('post/edit-new-user/{id}', [FrontAuthController::class,'post_edit_new_user'])->name('post_user.edit');
    Route::get('post/edit-role-user/{id}', [FrontAuthController::class,'post_edit_role_user'])->name('post_user_role.edit');
    Route::get('post/edit-group-user/{id}', [FrontAuthController::class,'post_edit_group_user'])->name('post_user_group.edit');
    // delete
    Route::get('post/delet-new-user/{id}', [FrontAuthController::class,'post_delet_new_user'])->name('post_user.delet');
    Route::get('post/delet-role-user/{id}', [FrontAuthController::class,'post_delet_role_user'])->name('post_user_role.delet');
    Route::get('post/delet-group-user/{id}', [FrontAuthController::class,'post_delet_group_user'])->name('post_user_group.delet');
    // edit
    Route::post('post/update-new-user/{id}', [FrontAuthController::class,'post_update_new_user'])->name('post_user.update');
    Route::post('post/update-role-user/{id}', [FrontAuthController::class,'post_update_role_user'])->name('post_user_role.update');
    Route::post('post/update-group-user/{id}', [FrontAuthController::class,'post_update_group_user'])->name('post_user_group.update');

    // Ajax Requests
    Route::post('post/databyday', [FrontAuthController::class,'databyday'])->name('databyday');

    // Data Traker Table
    Route::get('/view-traker-data', [DataTableController::class,'traker_view_table'])->name('traker.view');
    Route::get('/add-traker-data', [DataTableController::class,'traker_add_table'])->name('traker.add');
    Route::post('/post-traker-data', [DataTableController::class,'traker_post_table'])->name('traker.post');
    Route::get('/edit-tracker-data/{id}', [DataTableController::class,'tracker_edit'])->name('tracker_data.edit');
    Route::post('/edit-tracker-data-post/{id}', [DataTableController::class,'tracker_edit_post'])->name('tracker_data_post.edit');
    Route::get('/delet-tracker-data/{id}', [DataTableController::class,'tracker_delete'])->name('tracker_data.delet');


});
