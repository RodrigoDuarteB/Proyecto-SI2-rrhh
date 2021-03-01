<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model{
    use HasFactory;
    protected $fillable = ['name', 'last_name', 'work_phone', 'personal_phone', 'image_name', 'sex', 'ID_number', 'address', 'nationality', 'passport', 'birthdate', 'birthplace', 'marital_status', 'children', 'emergency_contact', 'status','department_id', 'user_id'];
    public $timestamps = false;

    //estados
    public static $ACTIVE = 1;

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    //departamento perteneciente
    public function department(){
        return $this->belongsTo(Department::class, 'department_id');
    }

    //departamento que dirige
    public function managingDepartment(){
        return $this->hasOne(Department::class);
    }

    public function contracts(){
        return $this->hasMany(Contract::class);
    }

    public function workdays(){
        return $this->hasMany(Workday::class);
    }

    //ordenes realizadas
    public function placedOrders(){
        return $this->hasMany(Order::class);
    }

    //ordenes recibidas
    public function orders(){
        return $this->hasMany(OrderEmployees::class);
    }

}
