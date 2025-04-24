<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // ✅ Import Str
use Carbon\Carbon; // ✅ Import Carbon for date formatting

class News extends Model
{
    use HasFactory;

    // The table associated with the model.
    protected $table = 'news';

    protected $dates = ['created_at', 'updated_at'];

    // The primary key for the table
    protected $primaryKey = 'id';

    // Indicates if the model should be timestamped.
    public $timestamps = true;

    // The attributes that are mass assignable.
    protected $fillable = [
        'title',
        'slug',
        'type',
        'description',
        'image'
    ];

    // Automatically generate slug when creating a new news article
    public static function boot()
    {
        parent::boot();

        static::creating(function ($news) {
            $news->slug = Str::slug($news->title);
        });
    }

    // Format created_at field
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }

    // Format updated_at field
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }
}
