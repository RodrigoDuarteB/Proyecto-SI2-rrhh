<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model{
    use HasFactory;
    protected $fillable = ['name', 'last_name', 'work_phone', 'personal_phone', 'image_name', 'sex', 'ID_number', 'address', 'nationality', 'passport', 'birthdate', 'birthplace', 'marital_status', 'children', 'emergency_contact', 'status', 'user_id'];
    public $timestamps = false;

    //estados
    public static $ACTIVE = 1;
    public static $VACATION = 2;
    public static $FIRED = 3;
    public static $PUNISHED = 4;

    //estados civil
    public static $SINGLE = 'Solter';
    public static $MARRIED = 'Casad';
    public static $COMMITTED = 'Comprometid';
    public static $WIDOW = 'Viud';
    public static $DIVORCED = 'Divorciad';

    //sexos
    public static $MAN = 'Masculino';
    public static $WOMAN = 'Femenino';

    //otro
    public static $OTHER = 'Otro';

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
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

    public function currentContract(){
        return '';
    }

    //sus ausencias
    public function absences(){
        return $this->hasMany(Absence::class);
    }

    //ausencias que aprueba
    public function absence(){
        return $this->hasOne(Absence::class);
    }

}
