<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    use HasFactory;
    protected $table='profile_users';
    protected $fillable=['gender','bio','address','user_id'];


    public function user(){
        return $this->belongsTo('App\User','user_id');
        
    }
}
