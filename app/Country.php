<?php

namespace App;
use App\User;
use App\UserProfile;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $guarded =[];


    public function posts(){

        return $this->hasManyThrough(
            Post::class, //related table posts
            UserProfile::class, //through table country
            'country_id', //foreign key in through table
            'user_id',  //foreign key in related table
            'id', //local key
            'user_id'//foreign key of related table
        );
    }

    //"query" => "select `posts`.*, `user_profiles`.`country_id` as `laravel_through_key` from `posts` inner join `user_profiles` on `user_profiles`.`user_id` = `posts`.`user_id` where `user_profiles`.`country_id` = ?",
    // "bindings" => [
    //     1,
}

