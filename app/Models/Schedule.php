<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Utils;

class Schedule extends Model{
    use HasFactory;
    protected $fillable = ['name', 'clock_in', 'clock_out'];
    public $timestamps = false;

    public function plannings(){
        return $this->hasMany(Planning::class);
    }

}
