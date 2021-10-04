<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GradeSection;

class Grade extends Model
{
    use HasFactory;

    protected $table = 'grado';
    protected $primaryKey = 'id_grado';
    public $timestamps = false;

    protected $visible = [];    
    protected $hidden  = [];
    protected $fillable = [];
    protected $guarded  = [];

    public function gradeSeccion(){
        return $this->hasMany(GradeSection::class,'id_grado','id_grado');
    }

}
