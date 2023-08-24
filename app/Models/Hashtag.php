<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Hashtag extends Model
{
    use HasFactory;
    protected $fillable = ['tag']; // Campos llenables

    // Relación con el modelo Ad
    public function ad()
    {
        return $this->belongsTo(Ad::class, 'ad_id');
    }
}