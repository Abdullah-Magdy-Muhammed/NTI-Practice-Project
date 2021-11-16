<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class stdResource extends Authenticatable implements JWTSubject
{
    use HasFactory;
    
    protected $table = 'students';
    protected $fillable  = ['name','email','password','dep_id'];

    public function doQuery() {
        return stdResource::with('department')->orderby('id','desc')->paginate(10);
    }


    public function department() {

        return $this->belongsTo('App\Models\department','dep_id','id');
    }
     /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

}