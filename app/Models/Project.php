<?php

namespace App\Models;

use App\Enum\InstallationType;
use App\Enum\UF;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'description',
        'state',
        'installation_type',
        'equipments',
        'customer_id'
    ];

    protected $casts = [
        'state' => UF::class,
        'installation_type' => InstallationType::class,
        'equipments' => 'array',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
