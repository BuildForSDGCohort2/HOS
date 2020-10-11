<?php

use App\Http\Controllers\HospitalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserRoleController;
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

Route::get('/', function () {
    return Redirect()->route('login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('user.dashboard');
})->name('dashboard');



/*
|--------------------------------------------------------------------------
| ProfileController
|--------------------------------------------------------------------------
|
| Maintain user profile. From update delete profile update 
|
*/
Route::group(['prefix'=> 'User-Profile',  'middleware' => 'auth'], function(){

	Route::get('/show', [ProfileController::class, 'showprofile'])->name('show-profile');



	/* add user **/
    Route::get('/adduser', [ProfileController::class, 'add_user'])->name('add-user');
    Route::post('/saveuser', [ProfileController::class, 'save_user'])->name('save-user');
    Route::get('/allusers', [ProfileController::class, 'all_user'])->name('all-user');
    Route::post('/viewuserinfo', [ProfileController::class, 'view_user'])->name('view-user');






});







/*
|--------------------------------------------------------------------------
| HospitalController
|--------------------------------------------------------------------------
|
| Maintain user profile. From update delete profile update 
|
*/
Route::group(['prefix'=> 'HMS',  'middleware' => 'auth'], function(){

	Route::get('/add-patient', [HospitalController::class, 'newpatient'])->name('new-patient');
	Route::post('/save-patient', [HospitalController::class, 'savepatient'])->name('save-patient');
	Route::get('/edit-patient/{id}', [HospitalController::class, 'editpatient'])->name('edit-patient');
	Route::get('/delete-patient/{id}', [HospitalController::class, 'deletepatient'])->name('delete-patient');

	Route::get('/all-patient', [HospitalController::class, 'allpatient'])->name('all-patient');


	
/*  doctors script here */
	Route::get('/search-patient', [HospitalController::class, 'searchpatient'])->name('searchpatient');

	Route::post('/search-patient', [HospitalController::class, 'searchuser'])->name('searchnow');

	Route::get('/get-info/{ref}', [HospitalController::class, 'getinfo'])->name('getinfo');
	
	Route::get('/get-infoall/{cardid}', [HospitalController::class, 'getinfoall'])->name('getinfoall');

	Route::post('/save-doctor', [HospitalController::class, 'save_doctor'])->name('save-doc');

	//docallpatients
	Route::get('/allpaientsdoc', [HospitalController::class, 'allpaientsdoc'])->name('allpaientsdoc');


	//laboratoty
	Route::get('/labsearch', [HospitalController::class, 'labsearch'])->name('labsearch');

	Route::post('/lab-search-patient', [HospitalController::class, 'labsearchuser'])->name('labsearchnow');

	Route::get('/lab-get-info/{ref}', [HospitalController::class, 'labgetinfo'])->name('labgetinfo');

	Route::post('/savebloodtest', [HospitalController::class, 'savebloodtest'])->name('savebloodtest');

	Route::post('/saveurinetest', [HospitalController::class, 'saveurinetest'])->name('saveurinetest');

	Route::get('/allpaientslab', [HospitalController::class, 'allpaientslab'])->name('allpaientslab');



	//pharmacy
	Route::get('/pharsearch', [HospitalController::class, 'pharsearch'])->name('pharsearch');

	Route::post('/phar-search-patient', [HospitalController::class, 'parsearchuser'])->name('parsearchuser');

	Route::post('/par-druggiven', [HospitalController::class, 'druggiven'])->name('druggiven');

	Route::get('/phar-get-info/{ref}', [HospitalController::class, 'phargetinfo'])->name('phargetinfo');

	Route::get('/allpaientsphar', [HospitalController::class, 'allpaientsphar'])->name('allpaientsphar');



	//Cashier
	Route::get('/cashiersearch', [HospitalController::class, 'cashiersearch'])->name('cashiersearch');

	Route::post('/cash-search-patient', [HospitalController::class, 'cashsearchuser'])->name('cashsearchuser');

	Route::get('/cash-get-info/{ref}', [HospitalController::class, 'cashgetinfo'])->name('cashgetinfo');

	Route::post('/cash-save-patient', [HospitalController::class, 'cashsave'])->name('cashsave');






});







//Roles and Permssions Configuration


Route::group(['prefix'=> 'UserManagement',  'middleware' => 'auth'], function(){

	Route::get('/adduserRole', [UserRoleController::class, 'addrole'])->name('add-user-role');


    Route::post('/adduserRole/save/user/role', [UserRoleController::class, 'addrole_save'])->name('user-role-save');


     Route::post('/adduserRole/save/user/permission', [UserRoleController::class, 'addpermission_save'])->name('user-permission-save');



    Route::post('/adduserRole/edit/role/{id}', [
       UserRoleController::class,'edit_role_per'])->name('edit-role-perm');


    Route::post('/adduserRole/edit/roles/update', [
        UserRoleController::class,'edit_role_save'])->name('edit-role-update');


    Route::post('/adduserRole/edit/permsission/update', [
        UserRoleController::class,'edit_per_save'])->name('edit-perm-update');

    
    Route::get('/adduserRole/assign/role/permission/{id}', [
        UserRoleController::class,'assignrole_to_permission'])
    ->name('assingn-role-to-permission');

    Route::post('/adduserRole/assign/role/permission/save', [
        UserRoleController::class,'assignrole_to_permission_save'])->name('assingn-role-to-permission-save');


    Route::post('/adduserRole/assign/role/edit/permission/{id}', [
       UserRoleController::class,'edit_permission'])->name('edit-role-assign-to-permission');

    

    //user and their roles

    Route::get('/users/roles/display/rolesandUsers', [
        'uses' => 'UserRoleController@user_roles_display',
        'as' => 'users-roles-display'
    ]);


    //forcelogout

    Route::get('/users/force/logout', [
        'uses' => 'UserRoleController@user_force_logout',
        'as' => 'logout-user-force'
    ]);

    Route::post('/users/force/logout/{id}', [
        'uses' => 'UserRoleController@user_force_logout_update',
        'as' => 'logout-user-force-update'
    ]);

    Route::post('/users/force/logout/{id}/enableuser', [
        'uses' => 'UserRoleController@user_force_logout_enable',
        'as' => 'logout-user-force-enable'
    ]);



    Route::get('/set-locale/{lang}', [
        'uses' => 'UserRoleController@user_set_locale',
        'as' => 'setLocale'
    ]);


});







