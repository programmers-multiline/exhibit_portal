<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrochureDownload extends Model
{
    use HasFactory;
     protected $table = 'brochure_downloads';

    protected $fillable = [
        'recipient_id',
        'email',
        'downloaded_at'
    ];
}
