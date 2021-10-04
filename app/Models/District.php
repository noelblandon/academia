<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\Teacher;

class District extends Model
{
    use HasFactory;

    protected $table = 'depto_mun_barrio';
    protected $primaryKey = 'id_barrio';
    public $timestamps = false;

    protected $visible = [];    
    protected $hidden  = [];
    protected $fillable = [];
    protected $guarded  = [];

    public function city(){
        return $this->belongsTo(City::class,'id_mun', 'id_mun');
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class,'id_barrio','id_barrio');
    }
}
