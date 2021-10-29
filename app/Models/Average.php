<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Average extends Model
{
    use HasFactory;

    protected $table = 'promedio';
    protected $primaryKey = 'id_promedio';
    public $timestamps = false;

    protected $visible = [];    
    protected $hidden  = [];
    protected $fillable = [];
    protected $guarded  = [];

   
}
