<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'semestre', 'carrera_id'
    ];

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
        /*
        return DB::select(DB::raw("select u.id, name, cast(count(cu.user_id) as varchar(03)) as sesion_number from users u left outer join clase_user cu on cu.user_id = u.id inner join role_user ru on ru.user_id = u.id and role_id = 2 group by u.id, name"));
        */
        return User::where('role_id', 2)->leftJoin('clase_user', 'users.id', '=', 'clase_user.user_id')->join('role_user', 'users.id', '=', 'role_user.user_id')->selectRaw('users.id, name, count(clase_user.user_id) sesion_completed')->groupByRaw('users.id, name');
        /*
        return User::select(`u.id`, `name`)
            ->addSelect(DB::raw(`count(cu.user_id) as sesion_number`))
            ->from(`users as u`)
            ->join(`clase_user as cu`, function ($join) {
                $join->on(`cu.user_id`, `=`, `u.id`);
            })
            ->join(`role_user as ru`, function ($join) {
                $join->on(`ru.user_id`, `=`, `u.id`)
                    ->on(`role_id`, `=`, 2);
            })
            ->groupBy(`u.id`)
            ->groupBy(`name`)->paginate(5);
            */
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
