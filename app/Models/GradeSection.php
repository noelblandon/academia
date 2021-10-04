<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Grade;
use App\Models\Teacher;

class GradeSection extends Model
{
    use HasFactory;

    protected $table = 'grado_seccion';
    protected $primaryKey = 'id_seccion';
    public $timestamps = false;

    protected $visible = [];    
    protected $hidden  = [];
    protected $fillable = [];
    protected $guarded  = [];

    public function grade(){
        return $this->belongsTo(Grade::class,'id_grado','id_grado');
    }

    public function tutor(){
        return $this->hasOne(Teacher::class,'id_docente','id_tutor');
    }
}
