<?php

namespace App\Models;

use App\Models\Report;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evidence extends Model
{
    use HasFactory;

    protected $table = 'evidences';
    public $timestamps = false;

    protected $fillable = [
        'report_id',
        'url',
        'title',
        'description'
    ];

    public function report(): BelongsTo
    {
        return $this->belongsTo(Report::class);
    }
}
