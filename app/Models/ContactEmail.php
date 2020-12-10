<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\ContactEmailCreated;

class ContactEmail extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'message'];

    protected $dispatchesEvents = [
        'created' => ContactEmailCreated::class,
    ];

}
