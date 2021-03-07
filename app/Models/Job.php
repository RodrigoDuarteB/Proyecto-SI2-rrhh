<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model{
    use HasFactory;
    protected $fillable = ['name', 'description', 'base_salary', 'department_id'];
    public $timestamps = false;

    public function department(){
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function contracts(){
        return $this->hasMany(Contract::class);
    }

}
