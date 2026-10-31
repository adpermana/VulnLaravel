<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $table = 'uploads';

    protected $fillable = [
        'user_id', 'original_name', 'filename', 'path', 'mime_type', 'size',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
