<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Kyslik\ColumnSortable\Sortable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use Sortable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'semestre', 'carrera_id'
    ];

    public $sortable = [
        'name', 'email', 'password', 'semestre', 'carrera_id'
    ];

    public function carrera_nombreSortable($query, $direction)
    {
        return $query->join('carreras', 'users.carrera_id', '=', 'carreras.id')
            ->orderBy('carrera_nombre', $direction)
            ->select('users.*');
    }

    protected $attributes = array(
        'semestre' => 1,
        'carrera_id' => 1,
    );

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /*
    public function sesions()
    {
        return $this->hasMany(Sesion::class);
    }
    */

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }

    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }

    public function clases()
    {
        return $this->belongsToMany(Clase::class)->withTimestamps();;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasAnyRoles($roles)
    {
        return null != $this->roles()->whereIn('name', $roles)->first();
    }

    public function hasAnyRole($roles)
    {
        return null != $this->roles()->where('name', $roles)->first();
    }

    static public function getAllStudents()
    {
        return User::where('role_id', 2)->join('role_user', 'users.id', '=', 'role_user.user_id')->join('carreras', 'users.carrera_id', '=', 'carreras.id')->join('roles', 'role_user.role_id', '=', 'roles.id')->select('users.id', 'roles.name', 'users.name', 'users.email', 'users.semestre', 'carreras.carrera_nombre');
    }

    static public function getStudentAllinAll()
    {
        return User::where('role_id', 2)->leftJoin('clase_user', 'users.id', '=', 'clase_user.user_id')->join('role_user', 'users.id', '=', 'role_user.user_id')->selectRaw('users.id, name, count(clase_user.user_id) sesion_completed')->groupByRaw('users.id, name');
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
