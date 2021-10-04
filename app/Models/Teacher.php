<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\District;
use App\Models\Career;
use App\Models\GradeSection;
use App\Models\User;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'docentes';
    protected $primaryKey = 'id_docente';
    public $timestamps = false;

    protected $visible = [];    
    protected $hidden  = [];
    protected $fillable = [];
    protected $guarded  = [];


    public function district(){
       return $this->hasOne(District::class,'id_barrio','id_barrio');
    }

    public function career(){
        return $this->hasOne(Career::class,'id_carrera','id_carrera');
    }

    public function grade_section(){
        return $this->belongsTo(GradeSection::class,'id_docente','id_tutor');
    }

    public function user(){
        return $this->belongsTo(User::class,'id_docente','id_docente');
    }

}
