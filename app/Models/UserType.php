<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserType extends Model
{
    use HasFactory;

    protected $table = 'tipo_user';
    protected $primaryKey = 'id_tipo_user';
    public $timestamps = false;

    protected $visible = [];    
    protected $hidden  = [];
    protected $fillable = [];
    protected $guarded  = [];

    public function user(){
        return $this->belongsTo(User::class,'tipo_user','id_tipo_user');
    }
}
