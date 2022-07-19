<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin;
use App\Http\Controllers\ForgotPasswordController;
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
Route::post('login_login', [admin::class, 'login'])->name('signin');
Route::get('/', function () {
    return view('home');
});
// Route::get('/mail', function () {
//     return view('mail.contact');
// });
Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('create_admin', function () {
    return view('admin.new_admin');
});
Route::get('admin/about', [admin::class, 'about']);
Route::get('admin/setting', [admin::class, 'site_setting']);
Route::get('admin/project', [admin::class, 'project']);
Route::post('update_project_type', [admin::class, 'update_project_type']);
Route::post('update_project', [admin::class, 'update_project']);
Route::get('admin/testimony', [admin::class, 'test']);
Route::get('admin/administrator', [admin::class, 'admini']);
Route::get('logout', [admin::class, 'logout']);
Route::post('admin/save_project_type', [admin::class, 'save_project_type']);
Route::post('admin/save_project', [admin::class, 'save_project']);
Route::get('admin/delete_project_type/{id}', [admin::class, 'delete_project_type']);
Route::get('admin/delete_project/{id}', [admin::class, 'delete_project']);
Route::get('admin/delete_testimony/{id}', [admin::class, 'delete_test']);
Route::post('admin/save_site_settings', [admin::class, 'save_site_settings']);
Route::post('admin/update_testimony', [admin::class, 'update_test_stat']);
Route::post('admin/save_about', [admin::class, 'save_about']);
Route::post('admin/save_testimony', [admin::class, 'save_test']);
Route::post('admin/save_admin', [admin::class, 'save_admin']);
Route::post('admin/update_admin_status', [admin::class, 'update_admin_status']);
Route::get('admin/delete_admin/{id}', [admin::class, 'delete_users']);
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');




Route::get('project', function () {
    return view('project');
});
Route::get('/contact-us', function () {
    return view('contact');
});
Route::post('admin/save_contact', [admin::class, 'submitContactForm'])->name('contact.submit');
Route::get('about', function () {
    return view('about');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/admin-login', function () {
    return view('auth.login');
});
