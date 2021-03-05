<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model{
    use HasFactory;
    protected $fillable = ['title', 'description', 'date', 'employee_id'];
    public $timestamps = false;

    public function employee(){
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function employees(){
        return $this->hasMany(OrderEmployees::class)->with('employee');
    }
}
