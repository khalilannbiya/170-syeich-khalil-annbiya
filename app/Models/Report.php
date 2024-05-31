<?php

namespace App\Models;

use App\Models\User;
use App\Models\Witness;
use App\Models\Category;
use App\Models\Division;
use App\Models\Evidence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'division_id',
        'category_id',
        'title',
        'description',
        'location',
        'status',
        'time',
        'unic_code',
        'is_private',
        'is_anonymous',
        'slug'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }

    public function evidences(): HasMany
    {
        return $this->hasMany(Evidence::class);
    }

    public function witnesses(): HasMany
    {
        return $this->hasMany(Witness::class);
    }
}
