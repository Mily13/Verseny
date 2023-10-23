<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionModel extends Model{
    use HasFactory;

    protected $table = 'versenyek';
    protected $primaryKey = 'v_id';
    protected $fillable = ['name', 'year', 'description', 'country', 'sport'];
    public $timestamps = false;

    public static function getCompetitionName($v_id){
        return self::where('v_id', $v_id)->first();
    }

    public static function isCompetitionExisting($name, $year){
        return self::where('name', $name)->where('year', $year)->exists();
    }
}
