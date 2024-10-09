<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

class Mod extends Model
{
    use HasFactory;
    use HasTags;

    protected $fillable = [
        'author_id',
        'title',
        'description',
        'cover_image_path',
        'approved_at',
        'published_at'
    ];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('role')
            ->withTimestamps();
    }

    public function versions()
    {
        return $this->hasMany(ModVersion::class);
    }
}
