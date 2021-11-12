<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class stdResource extends Authenticatable
{
    use HasFactory;
    
    protected $table = 'students';
    protected $fillable  = ['name','email','password','dep_id'];
}
