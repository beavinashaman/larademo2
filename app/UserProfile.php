<?php
namespace App;
use App\User;
use App\UserProfile;
use Illuminate\Database\Eloquent\Model;


class UserProfile extends Model
{
    protected $guarded = [];

    public function user(){

        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function country(){
        return $this->belongsTo(Country::class,'country_id','id');
    }

    protected $fillable = [
        'user_id','city','country_id','photo','phone',
    ];
   

   
}