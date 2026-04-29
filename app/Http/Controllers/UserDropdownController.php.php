<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExternalUser;

class UserDropdownController.php extends Controller
{
    //
   public function create()
{
    $users = ExternalUser::getUsersWithCompanyAndDepartment();
    $users = ExternalUser::select(
                'users.emp_id',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.name',
                'users.email',
                'oms_companies.code',
                'oms_departments.department'
            )
            ->leftJoin('oms_companies', 'oms_companies.id', '=', 'users.company_id')
            ->leftJoin('oms_departments', 'oms_departments.id', '=', 'users.department_id')
            ->orderBy('users.first_name')
            ->get();

  //  return view('form.create', compact('users'));
  return view('participants.index', compact('users'));
}
}
