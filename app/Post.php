<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $guard=['user_id'];

//   protected $hidden = [
//     'title', 'user_id',
// ];

public function user(){
  return $this->belongsTo(User::class, 'user_id', 'id');
}
}
