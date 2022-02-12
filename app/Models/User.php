<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table='users';
    public function role(){
        return $this->hasOne(Role::class,"role_id","role_id");
    }
    public function gender(){
        return $this->hasOne(Gender::class,"gender_id","gender_id");
    }
    protected $fillable = [
        "account_id",
        "role_id",
        "gender_id",
        "first_name",
        "middle_name",
        "last_name",
        "email",
        "password",
        "display_picture_link",
        "delete_flag",
        "modified_by",
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
