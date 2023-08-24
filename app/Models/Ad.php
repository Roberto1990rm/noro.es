<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'content',
        'category',
        'image',
        'user_id',
        'published_at',
        'is_visible',
        'likes_count',
        'video_url',
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

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Dentro del modelo Ad
public function relatedImages()
{
    return $this->hasMany(RelatedImage::class);
}


// app/Models/Ad.php

public function hashtags()
{
    return $this->hasMany(Hashtag::class, 'ad_id');
}


}
