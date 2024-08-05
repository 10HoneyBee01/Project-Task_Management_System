<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'serial', 'project_code', 'description'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
