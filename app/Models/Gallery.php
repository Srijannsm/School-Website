<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon; 

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
        'slug',
        'images',
        'image',
        'news_id',
        'notices_id',
        'messages_id',

    ];
    protected $casts = [
        'images' => 'array', // Automatically convert JSON to array
    ];
    
    public static function boot()
    {
        parent::boot();

        static::creating(function ($images) {
            $images->slug = Str::slug($images->title);
        });
    }
    
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }
    
    public function photos()
    {
        return $this->hasMany(Gallery::class, 'news_id');
        return $this->hasMany(Gallery::class, 'notices_id');
        return $this->hasMany(Gallery::class, 'messages_id');
    }
}
