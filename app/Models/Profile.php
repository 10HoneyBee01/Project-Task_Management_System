<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'address', 'photo', 'user_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}