<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use ESolution\DBEncryption\Traits\EncryptedAttribute;

class Log extends Model{
    use HasFactory, EncryptedAttribute;
    protected $fillable = ['user_ip', 'action_type', 'action', 'datetime', 'user_id'];
    public $timestamps = false;
    protected $encryptable = ['user_ip', 'action_type', 'action', 'datetime'];

    //tipos de accion
    public static $CREATED = '1';
    public static $EDITED = '2';
    public static $DELETED = '3';
    public static $LOGGED = '4';
    public static $CLOSED = '5';

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function new($action_type, $action){
        Log::create([
            'user_ip' => request()->getClientIp(),
            'action_type' => $action_type,
            'action' => $action,
            'datetime' => Carbon::now('America/La_Paz')->toDateTimeString(),
            'user_id' => auth()->user()->id
        ]);
    }

}
