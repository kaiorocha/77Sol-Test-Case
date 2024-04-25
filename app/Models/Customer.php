<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'document',
        'emails',
        'contact_numbers'
    ];

    protected $casts = [
        'emails'          => 'array',
        'contact_numbers' => 'array',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
