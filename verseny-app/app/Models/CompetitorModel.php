<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitorModel extends Model{
    use HasFactory;

    protected $table = 'versenyzok';
    protected $primaryKey = 'versenyzo_id';
    protected $fillable = ['f_id', 'fordulo_id'];
    public $timestamps = false;

    public static function getCompetitorFids($fordulo_id){
        return self::where('fordulo_id', $fordulo_id)->pluck('f_id')->toArray();
    }

    public static function isCompetitor($f_id, $fordulo_id){
        return self::where('f_id', $f_id)->where('fordulo_id', $fordulo_id)->exists();
    }

}
