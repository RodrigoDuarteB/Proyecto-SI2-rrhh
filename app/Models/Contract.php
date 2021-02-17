<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model{
    use HasFactory;
    protected $fillable = ['name', 'description', 'initial_date', 'final_date', 'employee_id', 'job_id', 'planning_id'];
    public $timestamps = false;

    public function employee(){
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function job(){
        return $this->belongsTo(Job::class, 'job_id');
    }

    public function planning(){
        return $this->belongsTo(Planning::class, 'planning_id');
    }
}
