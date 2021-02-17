<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model{
    use HasFactory;
    protected $fillable = ['name', 'description', 'parent_id', 'employee_id'];
    public $timestamps = false;

    public function manager(){
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function subDepartments(){
        return $this->hasMany(Department::class, 'parent_id');
    }

    public function parent(){
        return $this->belongsTo(Department::class);
    }

}
