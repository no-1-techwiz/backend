<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'location_id',
        'cost',
    ];

    /**
     * Get the location that owns the expense.
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
