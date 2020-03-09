<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = \App\User::with(['roles','profile'])->get();
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = \App\Role::all();
        $countries =\App\Country::all();
        return view('dashboard.users.create',compact('countries','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = [
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];
        
        $user = \App\User::create($user);
        dd($user);
        $filename = sprintf('thumbnail_%s.jpg',random_int(1,1000));
        if($request->hasFile('photo'))
        $filename = $request->file('photo')->storeAs('profiles',$filename, 'public');
        else
        $filename = "profiles/dummy.jpg";

        if($user){
            $profile = new \App\Userprofile([
                'user_id' => $user->id,
                'city' => $request->city,
                'country_id' => $request->country,
                'photo' => $filename,
                'phone' => $request->phone,

            ]);
            //dd($profile);

            $user->profile()->save($profile);
            $user->roles()->attach($request->roles);
            return redirect()->route('users.index');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = \App\User::with(['profile','roles'])->where('id', $id)->first();
        return view('dashboard.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \App\User::with(['profile','roles'])->where('id', $id)->first();
        $countries = \App\Country::all();
        $roles = \App\Role::all();
        return view('dashboard.users.edit',compact('user','countries','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = \App\User::find($id);
        $user-> name = $request->name;
        $user-> email = $request->email;
            
        //dd($user);
        $filename = sprintf('thumbnail_%s.jpg',random_int(1,1000));
        if($request->hasFile('photo'))
        $filename = $request->file('photo')->storeAs('profiles',$filename, 'public');
        else
        $filename = $user->profile->photo;

        if($user->save()){
            
        //     $profile = \App\UserProfile::where('user_id', $user->id)->get();

        //     $profile->city => $request->city,
        //     $profile->country_id => $request->country,
        //     $profile->photo => $filename,
        //     $profile->phone => $request->phone,

        // //dd($profile);

        // $profile()->save();


            $profile = [
                'city' => $request->city,
                'country_id' => $request->country,
                'photo' => $filename,
                'phone' => $request->phone,

            ];
            //dd($profile);

            $user->profile()->update($profile);
            $user->roles()->sync($request->roles);
            return redirect()->route('users.index');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = \App\User::find($id);
        $user->profile()->delete();
        $user->roles()->detach();
        $user->delete();
        return redirect()->route('users.index');
    }
}
