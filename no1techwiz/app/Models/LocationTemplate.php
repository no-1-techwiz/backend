<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'image',
        'description', // Thêm vào đây
    ];
    // Mối quan hệ với Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Mối quan hệ với Location
    public function locations()
    {
        return $this->hasMany(Location::class);
    }
}