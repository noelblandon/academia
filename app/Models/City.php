<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\State;
use App\Models\District;

class City extends Model
{
    use HasFactory;

    protected $table = 'depto_municipio';
    protected $primaryKey = 'id_mun';
    public $timestamps = false;

    protected $visible = [];    
    protected $hidden  = [];
    protected $fillable = [];
    protected $guarded  = [];

    public function state(){
        return $this->belongsTo(State::class,'id_depto', 'id_depto');
    }

    public function districts(){        
        return $this->hasMany(District::class, 'id_mun', 'id_mun');
    }
}
