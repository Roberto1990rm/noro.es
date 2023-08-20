<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class RelatedImage extends Model
{
    use HasFactory;

    protected $fillable = ['image_path', 'ad_id'];


    // Define the relationship with the Ad model
    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
}

