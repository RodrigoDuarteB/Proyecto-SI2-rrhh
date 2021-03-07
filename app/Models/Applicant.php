<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'last_name', 'personal_phone', 'email', 'job_id', 'academic_degree', 'career', 'resume_file', 'value', 'status'];
    public $timestamps = false;

    //estados
    public static $PRESENTED    = 0;
    public static $REVIEWED     = 1;
    public static $NOTIFIED     = 2;
    public static $INTERVIEWED  = 3;
    public static $FEATURED     = 4;
    public static $CONTRACTED   = 5;

    //cargo al que postula
    public function job(){
        return $this->belongsTo(Job::class, 'job_id');
    }


}
