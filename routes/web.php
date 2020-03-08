<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
GET, POST, PUT, PATCH, DELETE, OPTIONS, HEADS
VIEW, REDIRECT, PERMANAMENTREDIRECT, ANY, MATCH, MIDDLEWARE, GROUP, RESOURCE
*/
Route::get('/',function(){
return view("welcome");
});

//required route with dynamicparameter
// Route::get('welcome/{name}',function($name){
// return "Welcome,".$name;
// });

//optional route with dynamic parameter
//  Route::get('welcome/{name?}',function($name="Guest"){
// return "welcome,".$name;
// });

//Redirect route
//Route::redirect('/','home');

//VIEW ROUTE
//Route::view('/','welcome',['name'=>'Avinash','company'=>'Cresc']);

Route::get('welcome','WelcomeController@welcome');
Route::get('goodbye/{name?}','WelcomeController@goodbye');

//cms controller
Route::prefix('admin')->group(function(){

    Route::view('/','dashboard.admin');
    Route::resource('posts', 'PostController');
    Route::resource('profiles', 'UserProfileController');
    Route::resource('users','UserController');
    Route::resource('pages','PageController');
    Route::resource('categories','CategoryController');
    Route::resource('roles','RoleController');

});
