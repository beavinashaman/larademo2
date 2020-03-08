<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users(){
        return $this->belongsToMany(User::class, 'role_user', 'user_id', 'role_id', 'id', 'id');

    }

    protected $fillable = [
        'role_id','user_id',
    ];
}
