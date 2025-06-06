<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoMetaTag extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function taggable()
    {
        return $this->morphTo();
    }


        // Accessor for OG image URL
    public function getOgImageUrlAttribute()
    {
        return $this->og_image ? asset('storage/' . $this->og_image) : null;
    }

    // Accessor for Twitter image URL  
    public function getTwitterImageUrlAttribute()
    {
        return $this->twitter_image ? asset('storage/' . $this->twitter_image) : null;
    }
}
