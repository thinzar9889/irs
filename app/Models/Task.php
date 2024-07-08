<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $guarded = [];

   
    public function projects(){

        return $this->hasMany(Project::class);
        
    }
    public function intern()
    {
        return $this->belongsTo(Intern::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
