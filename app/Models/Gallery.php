<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    // The table associated with the model.
    protected $table = 'gallery';

    // The primary key for the table
    protected $primaryKey = 'id';

    // Indicates if the model should be timestamped.
    public $timestamps = true;

    // The attributes that are mass assignable.
    protected $fillable = [
        'title',
        'image',
        'news_id',
        'notices_id',
        'messages_id',

    ];
    public function photos()
    {
        return $this->hasMany(Gallery::class, 'news_id');
        return $this->hasMany(Gallery::class, 'notices_id');
        return $this->hasMany(Gallery::class, 'messages_id');
    }
}
