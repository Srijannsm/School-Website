<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academics extends Model
{
    use HasFactory;

    // The table associated with the model.
    protected $table = 'academics';

    // The primary key for the table
    protected $primaryKey = 'id';

    // Indicates if the model should be timestamped.
    public $timestamps = true;

    // The attributes that are mass assignable.
    protected $fillable = [
        'title',
        'description',
        
    ];
}
