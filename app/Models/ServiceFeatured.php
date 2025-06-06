<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceFeatured extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function serviceCategory()
    {
        return $this->belongsTo(ServiceCategory::class);
    }
}
