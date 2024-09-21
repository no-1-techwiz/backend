<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['location_template_id', 'trip_id', 'expense_id'];

    // Mối quan hệ với LocationTemplate
    public function locationTemplate()
    {
        return $this->belongsTo(LocationTemplate::class);
    }

    // Mối quan hệ với Trip
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
    
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function expense()
{
    return $this->belongsTo(Expense::class, 'expense_id'); // Đảm bảo trường 'expense_id' được chỉ định
}
}