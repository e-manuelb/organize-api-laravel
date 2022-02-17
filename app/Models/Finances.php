<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Finances extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category',
        'description',
        'location',
        'price',
        'transaction_date',
        'user_id'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
