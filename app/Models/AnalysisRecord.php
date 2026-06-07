<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnalysisRecord extends Model
{
    protected $fillable = [
        'type',
        'original_text',
        'summary',
        'tasks'
    ];
}
