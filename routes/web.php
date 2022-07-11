<?php

use App\Http\Controllers\Admin\adminCommentController;
use App\Http\Controllers\Admin\employeeController;
use App\Http\Controllers\Admin\memberController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\positionController;
use App\Http\Controllers\Admin\roomController;
use App\Http\Controllers\Admin\roomtypeController;
use App\Http\Controllers\Admin\userController;
use App\Http\Controllers\Members\member_roomtypeController;
use App\Http\Controllers\Members\member_roomController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\Users\bookingController;
use App\Http\Controllers\Users\userMainController;
use PhpParser\Builder\Namespace_;

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
//     return view('welcome');
// });



// Route for Login
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route for Supper Admin pages
Route::get('admin/index',               [HomeController::class, 'adminHome'])->name('admin.index');

// Route for CRUD Admin/room_type
Route::get('roomtype/index',            [roomtypeController::class, 'index'])->name('roomtype.index');
Route::get('roomtype/create',           [roomtypeController::class, 'create'])->name('roomtype.create');
Route::post('roomtype/store',           [roomtypeController::class, 'store'])->name('roomtype.store');
Route::get('roomtype-edit/{id}',        [roomtypeController::class, 'edit'])->name('roomtype.edit');
Route::put('roomtype-update/{id}',      [roomtypeController::class, 'update'])->name('roomtype.update');
Route::delete('roomtype-delete/{id}',   [roomtypeController::class, 'destroy'])->name('roomtype.delete');
Route::get('roomtype-search',           [roomtypeController::class, 'search'])->name('roomtype.search');




Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('/employee',   'employeeController');
});
Route::get('/employee/search', 'employeeController@search')->name('admin.employee.search');


// Rout for CRUD Register_Member
Route::get('register-member/index',         [memberController::class, 'index'])->name('register_member.index');
Route::get('register-member/create',        [memberController::class, 'create'])->name('register_member.create');
Route::post('register-member/store',        [memberController::class, 'store'])->name('register_member.store');
Route::get('register_member_edit/{id}',     [memberController::class, 'edit'])->name('register_member.edit');
Route::put('register_member_update/{id}',   [memberController::class, 'update'])->name('register_member.update');
Route::delete('register-member-delete/{id}', [memberController::class, 'destroy'])->name('register_member.delete');
Route::get('register-member-search',        [memberController::class, 'search'])->name('register_member.search');
Route::get('register-member/report',         [memberController::class, 'show'])->name('register_member.report');
Route::post('register-member/search_report',         [memberController::class, 'search_report'])->name('register_member.search_report');



// Rout for CRUD Admin/Room
Route::get('admin_register_room/index',             [roomController::class, 'index'])->name('register-room.index');
Route::get('admin_register_room/create',            [roomController::class, 'create'])->name('register-room.create');
Route::post('admin_register_room/store',            [roomController::class, 'store'])->name('register-room.store');
Route::get('admin_register_room/{id}',              [roomController::class, 'edit'])->name('register-room.edit');
Route::put('admin_register_room_update/{id}',       [roomController::class, 'update'])->name('register-room.update');
Route::delete('admin_register_room-delete/{id}',    [roomController::class, 'destroy'])->name('register-room.delete');
Route::get('admin_register_room_search',            [roomController::class, 'search_room'])->name('register-room.search');
Route::get('admin_room/report',                      [roomController::class, 'show'])->name('admin_room.report');
Route::post('admin_room/search_report',             [roomController::class, 'search_report'])->name('admin_room.search_report');



// Rout for CRUD Admin/users
Route::get('admin_users/index',         [userController::class, 'index'])->name('admin_users.index');
Route::get('admin_users/{id}',              [userController::class, 'edit'])->name('admin_users.edit');
Route::put('admin_users_update/{id}',       [userController::class, 'update'])->name('admin_users.update');
Route::delete('admin_users_delete/{id}', [userController::class, 'destroy'])->name('admin_users.delete');
Route::get('admin_users_search',        [userController::class, 'search_users'])->name('admin_users.search');
Route::get('admin_userss/report',         [userController::class, 'show'])->name('admin_userss.report');
Route::post('admin_users/search_report',         [userController::class, 'search_report'])->name('admin_users.search_report');

// Route for CRUD Admin/Comment
Route::get('admin_comment_index',           [adminCommentController::class, 'index'])->name('admin_comment.index');
Route::delete('admin_comment_delete/{id}',       [adminCommentController::class, 'delete_comments'])->name('admin_comment.delete');

// Route for member pages
Route::get('members/home', [HomeController::class, 'memberHome'])->name('members.index')->middleware('is_member');

// Route for CRUD Member/room_type
Route::get('member_roomtype/index',            [member_roomtypeController::class, 'index'])->name('member_roomtype.index');
Route::get('member_roomtype/create',           [member_roomtypeController::class, 'create'])->name('member_roomtype.create');
Route::post('member_roomtype/store',           [member_roomtypeController::class, 'store'])->name('member_roomtype.store');
Route::get('member_roomtype-edit/{id}',        [member_roomtypeController::class, 'edit'])->name('member_roomtype.edit');
Route::put('member_roomtype-update/{id}',      [member_roomtypeController::class, 'update'])->name('member_roomtype.update');
Route::delete('member_roomtype-delete/{id}',   [member_roomtypeController::class, 'destroy'])->name('member_roomtype.delete');
Route::get('member_roomtype_search',           [member_roomtypeController::class, 'search'])->name('member_roomtype.search');

// Rout for CRUD Member/Room
Route::get('member_register_room/index',         [member_roomController::class, 'index'])->name('member_register-room.index');
Route::get('member_register_room/create',        [member_roomController::class, 'create'])->name('member_register-room.create');
Route::post('member_register_room/store',        [member_roomController::class, 'store'])->name('member_register-room.store');
Route::get('member_register_room/{id}',          [member_roomController::class, 'edit'])->name('member_register-room.edit');
Route::put('member_register_room_update/{id}',   [member_roomController::class, 'update'])->name('member_register-room.update');
Route::delete('member_register_room-delete/{id}', [member_roomController::class, 'destroy'])->name('member_register-room.delete');
Route::get('member_register_room_search',        [member_roomController::class, 'search'])->name('member_register-room.search');
Route::get('member_register_room_details/{id}',          [member_roomController::class, 'details'])->name('member_register-room_details.edit');
Route::post('member_register_room_admore_image/{rooms}',   [member_roomController::class, 'admore_image'])->name('member_room.admore_image');
Route::post('member_register_room_comment/{rooms}',   [member_roomController::class, 'comment'])->name('member_room.comment');
Route::get('delete_member_image/{id}',         [member_roomController::class,   'delete_image'])->name('delete_member.image');
Route::get('delete_member_comment/{id}',         [member_roomController::class,   'delete_comments'])->name('delete_member.comment');

// Route for normal users
Route::get('/home', [HomeController::class, 'userHome'])->name('users.index');
Route::get('user_room_detail/{id}', [userMainController::class, 'user_room_details'])->name('user_room.details');
Route::post('user_comment/{roomget}',      [userMainController::class, 'user_comment'])->name('user_room.comment');
Route::post('user/booking/store/{rooms}',  [bookingController::class, 'store'])->name('booking.store');
Route::get('delete_users_comment/{id}',         [userMainController::class,   'delete_comments'])->name('delete_user.comment');
Route::get('user_show_roomtype{id}',         [HomeController::class, 'show_room_type'])->name('user_show.roomtype');
Route::get('user/booking/{id}', [bookingController::class, 'index'])->name('booking.index');
Route::put('user/booking_cancel/{id}',          [bookingController::class, 'update'])->name('booking.cancel');
Route::get('booking/history/',              [bookingController::class, 'booking_history'])->name('booking.history');
Route::delete('delete/booking_cancel/{id}',        [bookingController::class, 'destroy'])->name('delete.booking_cancel');
Route::get('user/room/search/',           [bookingController::class, 'search'])->name('user_room.search');







// Test Route
Route::get('/add-image', [ImageUploadController::class, 'addImage'])->name('images.add');
//For storing an image
Route::post('/store-image', [ImageUploadController::class, 'storeImage'])
    ->name('images.store');
//For showing an image
Route::get('/view-image', [ImageUploadController::class, 'viewImage'])->name('images.view');
