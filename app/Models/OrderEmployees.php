<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderEmployees extends Model{
    use HasFactory;
    protected $fillable = ['acomplished', 'time', 'order_id', 'employee_id'];
    public $timestamps = false;

    public function order(){
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function employee(){
        return $this->belongsTo(Employee::class. 'employee_id');
    }

}
