<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoundModel extends Model{
    use HasFactory;

    protected $table = 'fordulok';
    protected $primaryKey = 'fordulo_id';
    protected $fillable = ['name', 'date', 'v_id'];
    public $timestamps = false;

    public static function getRounds($v_id){
        return self::where('v_id', $v_id)->get();
    }

    public static function getRoundWithId($fordulo_id){
        return self::where('fordulo_id', $fordulo_id)->first();
    }

}
