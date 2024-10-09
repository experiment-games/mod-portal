<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModVersion extends Model
{
    use HasFactory;

    protected $fillable = [
        'mod_id',
        'version',
        'release_notes',
        'file_path',
        'external_link',
        'hash'
    ];

    public function mod()
    {
        return $this->belongsTo(Mod::class);
    }
}
