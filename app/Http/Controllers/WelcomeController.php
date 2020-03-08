<?php
namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use DB;


class WelcomeController extends Controller{
public function welcome(){
    // $posts = new Post;
    // $data=$posts->data(); 
    // return view('welcome',compact('data'));

    //normal mode
    //  $users =\App\User::all();
    //  return view('welcome', compact('users'));

    //eager loading
     $users =\App\User::with('profile')->get();
    //  $users =\App\User::with('profile.country:id,name')->get();
     return view('welcome', compact('users'));

    //with call back function
    // $users = \App\User::with([
    //     'profile' => function($profile){
    //         return $profile->with([
    //             'country' => function($country){
    //                 return $country->where('id',1);
    //             }
    //         ]);
    //     }

    // ])->get();
     
    // return view('welcome', compact('users'));
}

public function goodbye($name="Guest"){

    echo "Goodbye {$name}";
}

public function post(Request $request){
if($request->isMethod('POST')){
    return $request->input('title','Default Title');
}else{

    return view('post');
}

}



}