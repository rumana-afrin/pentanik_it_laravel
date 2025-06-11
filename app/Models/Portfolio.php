<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    public function technologies()
    {
        return $this->hasMany(Technology::class);
    }

    public function category()
    {
        return $this->belongsTo(PortfolioCategory::class, 'portfolio_category_id');
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
