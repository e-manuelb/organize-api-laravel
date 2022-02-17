<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password', 'created_at', 'updated_at'];

    public function diaries()
    {
        return $this->hasMany(Diary::class, 'id', 'user_id');
    }

    public function finances()
    {
        return $this->hasMany(Finances::class, 'id', 'user_id');
    }

    public function toDo()
    {
        return $this->hasMany(ToDo::class, 'id', 'user_id');
    }
    public function studies()
    {
        return $this->hasMany(Study::class, 'id', 'user_id');
    }
}
