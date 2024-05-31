<?php

namespace App\Models;

use App\Models\Report;
use App\Models\Division;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReportDivision extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['report_id', 'division_id'];

    public function report(): BelongsTo
    {
        return $this->belongsTo(Report::class);
    }

    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }
}
