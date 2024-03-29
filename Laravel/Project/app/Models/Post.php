<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title',
        'slug',
        'body',
        'image',
        'is_public',
        'published_at',
        'user_id'
    ];
    protected $dates = ['deleted_at'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
