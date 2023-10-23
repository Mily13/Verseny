<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model{
    use HasFactory;

    protected $table = 'felhasznalok';
    protected $primaryKey = 'f_id';
    protected $fillable = ['name', 'email', 'password', 'phone', 'age', 'gender'];
    public $timestamps = false;

    public static function getUser($f_id){
        return self::where('f_id', $f_id)->first();
    }

    public static function getUsers($fids){
        return self::whereIn('f_id', $fids)->get();
    }

    public static function getAcsessableUsers($fids){
        return self::whereNotIn('f_id', $fids)->get();
    }
}
