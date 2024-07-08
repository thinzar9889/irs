<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    
    protected $casts=[
        'images'=>'array',
        'files'=>'array'
    ];

    // public function interns(){

    //     return $this->hasMany(Intern::class);

    // }
    // public function tasks()
    // {
    //     return $this->hasMany(Task::class);
    //}

    public function leaders(){
        return $this->belongsToMany(ProjectLeader::class, 'project_leaders', 'project_id', 'intern_id');
    }

    public function members(){
        return $this->belongsToMany(ProjectMember::class, 'project_members', 'project_id', 'intern_id');
    }

}
