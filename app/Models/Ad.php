<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\AdController;



class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'content',
        'category',
        'image',
        'published_at',
        'is_visible',
        'likes_count',
    ];

    protected $dates = ['published_at'];

    public function getImageUrl()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return null;
    }

    public function users()
{
    return $this->belongsToMany(User::class)->withTimestamps();
}


public function user()
{
    return $this->belongsTo(User::class);
}

public function isLikedByUser($userId)
{
    return $this->likes()->where('user_id', $userId)->exists();
}




public function likes()
{
    return $this->belongsToMany(User::class, 'likes', 'ad_id', 'user_id')->withTimestamps();
}
}
