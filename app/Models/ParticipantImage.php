<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'participant_id',
        'image_name'
    ];

    public function participant()
    {
        return $this->belongsTo(Participants::class);
    }
}
