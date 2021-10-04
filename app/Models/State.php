<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;

class State extends Model
{
    use HasFactory;
    
    protected $table = 'departamento';
    protected $primaryKey = 'id_depto';
    public $timestamps = false;

    protected $visible = [];    
    protected $hidden  = [];
    protected $fillable = [];
    protected $guarded  = [];

    public function cities(){        
       return $this->hasMany(City::class, 'id_depto', 'id_depto');
    }

}
