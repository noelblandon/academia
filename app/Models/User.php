<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\UserType;
use App\Models\Teacher;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;


    
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    public $timestamps = false;

   // protected $visible = [];    
    protected $hidden  = ['id_docente','id_user'];
   // protected $fillable = [];
    //protected $guarded  = [];

   
    public function userType(){
        return $this->hasOne(UserType::class,'id_tipo_user','tipo_user');
    }

    public function teacher(){
        return $this->hasOne(Teacher::class,'id_docente','id_docente');
    }


    public function getFullnameAttribute(){
        return "{$this->nombre} {$this->apellido}";
    }
    public function getShortNameAttribute(){

        return  splitString($this->nombre)[0].' '. splitString($this->apellido)[0];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
 /*   protected $fillable = [
        'name', 'email', 'password',
    ];
*/
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
 /*   protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];
*/
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
  /*  protected $casts = [
        'email_verified_at' => 'datetime',
    ];
*/
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
 /*   protected $appends = [
        'profile_photo_url',
    ];*/
}
