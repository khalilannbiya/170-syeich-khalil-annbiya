<?php

namespace App\Models;

use App\Models\Report;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Witness extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['report_id', 'name', 'phone', 'address', 'description'];

    public function report(): BelongsTo
    {
        return $this->belongsTo(Report::class);
    }
}
