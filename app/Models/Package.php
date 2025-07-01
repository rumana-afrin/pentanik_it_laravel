<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
        protected $guarded = [];
        public function packageCategory()
        {
            return $this->belongsTo(PackageCategory::class);
        }

        public function packageFeature(){
            return $this->hasMany(Packagefeature::class);
        }


    //      public function getStarIconsAttribute()
    // {
    //     $stars = '';
    //     for ($i = 1; $i <= $this->star_rating; $i++) {
    //         $stars .= '<i class="fa-solid fa-star"></i>';
    //     }
    //     return $stars;
    // }

}
