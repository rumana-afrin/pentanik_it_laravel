<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvisorySkills extends Model
{
    use HasFactory;
        protected $guarded = [];

    public function advisory()
    {
        return $this->belongsTo(Advisory::class);
    }
}
