<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function blogTags()
    {
        return $this->hasMany(BlogTag::class);
    }
    
    public function blogGallaryImage()
    {
        return $this->hasMany(BlogGalleryImage::class);
    }

    public function seoMetaTag()
    {
        return $this->morphOne(SeoMetaTag::class, 'taggable');
    }

      // Accessor for thumbnail image URL
    public function getThumbnailImageUrlAttribute()
    {
        return $this->thumbnail_image ? asset('storage/' . $this->thumbnail_image) : null;
    }
}
