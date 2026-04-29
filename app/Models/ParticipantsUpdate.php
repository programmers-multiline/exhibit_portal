<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantsUpdate extends Model
{
    use HasFactory;
    protected $table = 'participants_update';

    protected $fillable = [
        'participant_id',
        'status',
        'description',
        'updated_by',
        'assigned_psc',
        'update_date',
        'uploaded_file'
        
    ];

    public function participant()
    {
        return $this->belongsTo(Participants::class, 'participant_id');
    }

    public function latestUpdate()
{
    return $this->hasOne(\App\Models\ParticipantsUpdate::class, 'participant_id')
                ->latest('update_date'); // or 'created_at' kung yun ang gusto mong base
}

public function files()
{
    return $this->hasMany(Participants::class, 'participant_id');
}


}
