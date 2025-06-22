<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advisory extends Model
{
    use HasFactory;
    protected $guarded = [];
        public function advisorySkills()
    {
        return $this->hasMany(AdvisorySkills::class);
    }
}
