<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrator extends Model{
    use HasFactory;
    protected $fillable = ['name', 'last_name', 'email', 'image_name', 'user_id'];
    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class);
    }

}
