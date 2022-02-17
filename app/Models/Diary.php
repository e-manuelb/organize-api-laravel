<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Diary extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['date', 'text'];
    protected $hidden = ['created_at', 'updated_at'];

    protected static function boot()
    {
        $id = Auth::id();
        
        parent::boot();

        static::creating(function ($query) use($id) {
            $query->user_id = $id;
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
