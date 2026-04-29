<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'participant_id',
        'file_path',
        'file_name',
        'file_type',
        'uploaded_by',
        'uploaded_at'
    ];

    public $timestamps = true;

    public function participant()
    {
        return $this->belongsTo(Participants::class, 'participant_id');
    }
}
