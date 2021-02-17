<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planning extends Model{
    use HasFactory;
    protected $fillable = ['name', 'description', 'schedule_id'];
    public $timestamps = false;

    public function schedule(){
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }

    public function contracts(){
        return $this->hasMany(Contract::class);
    }

}
