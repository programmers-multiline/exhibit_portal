<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedAgent extends Model
{
    use HasFactory;
    protected $table = 'assigned_agent';

    protected $fillable = [
        'participant_id',
        'psc_name',
        'psc_id',
        'psc_emp_id',
        'company_id',
        'assigned_by'
    ];
}
