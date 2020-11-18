<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bulletPoints()
    {
        return $this->morphMany(BulletPoint::class, 'bulletable');
    }

}
