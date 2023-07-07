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

//Routes to Views to show pages

Route::get('/', function () {
    return 'welcome to dashboard!';
});

//-----------------------------------------Start of User Controller -------------------------------------

Route::get('/login', [App\Http\Controllers\UserController::class,'show_login']);
Route::get('/view/{id}', [App\Http\Controllers\UserController::class,'show_view'])->middleware('check_login');
Route::get('/register', [App\Http\Controllers\UserController::class,'show_register'])->middleware('check_login');
Route::get('/delete', [App\Http\Controllers\UserController::class,'show_delete'])->middleware('check_login');
Route::get('/deleteuser/{id}', [App\Http\Controllers\UserController::class,'delete_user'])->middleware('check_login');
Route::get('/allusers', [App\Http\Controllers\UserController::class,'show_all_users'])->middleware('check_login');
Route::get('/editusers',[App\Http\Controllers\UserController::class,'show_update_user'])->middleware('check_login');
Route::get('/edituser/{id}', [App\Http\Controllers\UserController::class,'update_user'])->middleware('check_login');
Route::get('/logout',[App\Http\Controllers\UserController::class,'log_out']);



//Routes to send of validate data of forms

Route::post('/login_validation',[App\Http\Controllers\UserController::class,'validation_login']);
Route::post('/register_validation',[App\Http\Controllers\UserController::class,'validation_register'])->middleware('check_login');
//Route::get('/register_validation',[App\Http\Controllers\UserController::class,'validation_register']);
Route::post('/edituser_validation/{id}', [App\Http\Controllers\UserController::class,'edit_user_validation'])->middleware('check_login');



//------------------------------------------End of User Controller ------------------------------------------


//-----------------------------------------Start of Organization Controller -------------------------------------

Route::get('/allorg', [App\Http\Controllers\OrganizationController::class,'show_org'])->middleware('check_login');
Route::get('/addorg', [App\Http\Controllers\OrganizationController::class,'add_org'])->middleware('check_login');
Route::get('/deleteorg/{id}', [App\Http\Controllers\OrganizationController::class,'delete_org'])->middleware('check_login');
Route::get('/editorg/{id}',[App\Http\Controllers\OrganizationController::class,'edit_org'])->middleware('check_login');
Route::get('/vieworg/{id}',[App\Http\Controllers\OrganizationController::class,'view_org'])->middleware('check_login');



Route::post('/editorg_validation/{id}',[App\Http\Controllers\OrganizationController::class,'c_edit_org'])->middleware('check_login');;
Route::post('/register_org',[App\Http\Controllers\OrganizationController::class,'add_org_validation'])->middleware('check_login');;




//------------------------------------------End of Organization Controller ------------------------------------------



//---------------------------------------Start of Role Controller---------------------------------------------------

Route::get('/allrole', [App\Http\Controllers\RoleController::class,'show_role'])->middleware('check_login');
Route::get('/addrole', [App\Http\Controllers\RoleController::class,'add_role'])->middleware('check_login');
Route::get('/deleterole/{id}', [App\Http\Controllers\RoleController::class,'delete_role'])->middleware('check_login');
Route::get('/editrole/{id}',[App\Http\Controllers\RoleController::class,'edit_role'])->middleware('check_login');
Route::get('/viewrole/{id}',[App\Http\Controllers\RoleController::class,'view_role'])->middleware('check_login');



Route::post('/editrole_validation/{id}',[App\Http\Controllers\RoleController::class,'c_edit_role'])->middleware('check_login');
Route::post('/register_role',[App\Http\Controllers\RoleController::class,'add_role_validation'])->middleware('check_login');


//-------------------------------------End of Role Controller  ------------------------------------------------------



//---------------------------------------Start of ActionRole Controller ----------------------------------------------



Route::get('/ARMapping', [App\Http\Controllers\ActionRoleController::class,'getAllRoles'])->middleware('check_login');;
Route::post('/role_with_org', [App\Http\Controllers\ActionRoleController::class,'getAllRoleswithOrg']);
Route::post('/action_with_role', [App\Http\Controllers\ActionRoleController::class,'getActionRole']);
Route::post('/post_apm',[App\Http\Controllers\ActionRoleController::class,'setActionRole']);
//---------------------------------------End of ActionRole Controller ----------------------------------------------





//---------------------------------------Start of ActionPermission Controller ----------------------------------------------



Route::get('/APMapping', [App\Http\Controllers\ActionPermissionController::class,'getAllPermissions'])->middleware('check_login');;
Route::post('/post_permission',[App\Http\Controllers\ActionPermissionController::class,'getActionPermission']);


Route::post('/post_form',[App\Http\Controllers\ActionPermissionController::class,'setActionPermission']);
//---------------------------------------End of ActionPermission Controller ----------------------------------------------


