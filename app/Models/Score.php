<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $table='notas';
    protected $primaryKey = 'idnotas';
    public $timestamps = false;

    protected $visible = [];    
    protected $hidden  = [];
    protected $fillable = [];
    protected $guarded  = [];

}


