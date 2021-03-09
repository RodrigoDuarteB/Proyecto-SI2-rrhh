<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model{
    use HasFactory;
    protected $fillable = ['title', 'reason', 'type', 'begin', 'end', 'requested_date', 'status', 'employee_id', 'approver_id'];
    public $timestamps = false;

    public function employee(){
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function approver(){
        return $this->belongsTo(Employee::class, 'approver_id');
    }


}
