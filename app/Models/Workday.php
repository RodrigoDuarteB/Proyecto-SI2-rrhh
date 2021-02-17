<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workday extends Model{
    use HasFactory;
    protected $fillable = ['date', 'clock_in', 'clock_out', 'latitude', 'longitude', 'status', 'employee_id'];
    public $timestamps = false;

    public function employee(){
        return $this->belongsTo(Employee::class, 'employee_id');
    }

}
