<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedAgentLog extends Model
{
    use HasFactory;

    protected $fillable = [
                'company_id',
                'old_psc_emp_id',
                'old_psc_name',
                'new_psc_emp_id',
                'new_psc_name',
                'changed_by'
                ];
}
