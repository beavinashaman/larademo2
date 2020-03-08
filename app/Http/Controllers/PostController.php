<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreBlogPost;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // return $request->path();
        //return $request->url();
        //return $request->fullurl();
        //return $request->query('name');
        //return $request->input('age');

    
        // dd(env('APP_URL'));

        // $posts =new Post;
        // $data = $posts->data();
        // return view('posts.index', compact('data'));
        
//query builder
   // select, insert, update,delete, statement
   // $profile = DB::select("select * from profile");
   // $profile=DB::select("Select * from profile where id = ?", [1]);
   //$profile =DB::select("select * from profile where id=:id",['id'=>2]);
//    $profile = DB::insert("Insert into profile(`name`,`phone`,`city`,`country`) values (:name,:phone,:city,:country)",['name'=>'rakesh','phone'=>'9548712365','city'=>'Patna','country'=>'India']);
   
// $profile =DB::update("update profile set `phone`='11111111' where id =:id", ['id'=>2]);

//$profile = DB::delete("delete from profile where id =:id",['id'=>2]);

//$profile = DB::statement('Drop table users');
// $profile= DB::table('profile')->get(); //equivalent to select *

// foreach($profile as $d){
// echo $d->name;
// echo "<br />";
// }

// $profile= DB::table('profile')->select(DB::raw("count(*) as staff"))->where('role','staff')->groupBy('role')->first();

// dd($profile);

// >>> DB::table('profile')->select('role',DB::raw("Count(*) as Role"))->
// ... groupBy('role')->
// ... havingRaw('count(*)>0')->
// ... get();

// DB::table('profile')->orderByRaw("id DESC")->get();

//inner join
//DB::table('users')->join('profile','users.id','=','profile.user_id')->get();
//left join
//DB::table('users')->leftJoin('profile','users.id','=','profile.user_id')->get();    
//right join
//DB::table('users')->rightJoin('profile','users.id','=','profile.user_id')->get();
//union
//DB::table('profile')->unionAll(DB::table('profile'))->get();
//DB::table('profile')->union(DB::table('profile'))->get();
//DB::table('profile')->orderBy('id','DESC')->get();
//DB::table('profile')->selectRaw('COUNT(*) AS total, role')->groupBy('role')->get();
//DB::table('profile')->selectRaw('sum("id") AS total, role')->groupBy('role')->get();
//DB::table('profile')->selectRaw('COUNT(*) AS total, role')->groupBy('role')->having('role','staff')->get();
//DB::table('profile')->limit(2)->offset(2)->get();
//DB::table('profile')->insert(['name'=>'abc@mail.com','phone'=>'9548745213'])

//migration
//php artisan make:migration create_posts_table --create=posts
//php artisan migrate
//php artisan make:migration add_user_id_column_posts --table=posts
//php artisan migrate
//php artisan migrate:rollback
//php artisan migrate:refresh

//create modal, controller, migration, factory with one command
//php artisan make:model UserProfile -a
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       // $request->flash();
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request)
    {
        //return $request->all();
       // return $request->input('title');
        //return $request->input('_token');
        //return $request->file('photo');
        // $request->file('photo')->store('images');
        //$request->file('photo')->storeAs('images','logo.jpg','public');
        //$filename = sprintf('logo_%s.jpg',random_int(1,1000));
        //if($request->hasFile('photo'))
        //$request->file('photo')->storeAs('images',$filename,'public');
        //return view('posts.show', compact('data'));

        // $data = ['name'=>'Aman','age'=>26];
        // return response("Hellow World",200)->withHeaders([
        //     'Content-Type'=>'text/json'
        // ]);
        // $request->validate([
        //     'title' => 'required',
        //     'content' => 'required',
        //     'photo' => 'required',
        //     'check' => 'required'

        // ]);    

        //$request->validate();
        return back()->with('message', 'Form sucessfully submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'name' => 'Avinash Kumar',
            'age' => 40

        ];
        return view('posts.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBlogPost $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
