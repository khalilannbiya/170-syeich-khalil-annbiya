<?php

namespace App\Models;

use App\Models\User;
use App\Models\ReportDivision;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Division extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function reportDivisions(): HasMany
    {
        return $this->hasMany(ReportDivision::class);
    }
}
