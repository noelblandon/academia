<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enable extends Model
{
    use HasFactory;
    protected $table = 'habilitar_ce';
    protected $primaryKey = 'id_hab_CE';
    public $timestamps = false;
}
