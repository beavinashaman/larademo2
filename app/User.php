<?php

namespace App;
use App\Role;
use App\Scopes\VerifiedUsers;
use App\Scopes\NotVerifiedUsers;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\UserProfile;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing =false;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','name','user_id', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Global Scope
    public static function boot(){
        parent::boot();
        // static::addGlobalScope('vfu', function(Builder $builder){
        //         return $builder->where('email_verified_at','<>',null);

        // });

       // static::addGlobalScope(new VerifiedUsers);

        // static::addGlobalScope('nvfu', function(Builder $builder){
        //     return $builder->where('email_verified_at','=',null);
        // });

        static::addGlobalScope(new NotVerifiedUsers);


    }

    //Local Scope
    // public function scopeLocal($query){
    //     return $query->where('email_verified_at', '<>', null);
    // }

    public function scopeFindById($query, $id){
        return $query->where('id', $id);

    }

    public function profile(){
        return $this->hasOne(UserProfile::class,'user_id','id');
    }

    public function posts(){

        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    public function roles(){
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id', 'id');

    }

}