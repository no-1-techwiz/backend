<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
    ];

    /**
     * Quan hệ với mô hình Trip.
     */
    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}