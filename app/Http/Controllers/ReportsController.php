<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    //
    public function index()
    {
        $reports = DB::table('attendees_list')
            ->selectRaw("
                YEAR(year_attended) as year_per_participant,
                SUM(CASE WHEN exhibit_name = 'WorldBex' THEN 1 ELSE 0 END) as worldbex,
                SUM(CASE WHEN exhibit_name = 'PHILCONSTRUCT' THEN 1 ELSE 0 END) as philconstruct,
                SUM(CASE WHEN exhibit_name = 'PHA' THEN 1 ELSE 0 END) as pha,
                COUNT(*) as total_leads
            ")
            ->groupBy(DB::raw("YEAR(year_attended)"))
            ->orderBy('year_per_participant', 'desc')
            ->get();

       // return view('reports.index', compact('reports'));

          $reports_per_WorldBex = DB::table('attendees_list')
            ->selectRaw("
                YEAR(year_attended) AS year_per_exhibit,
                SUM(CASE WHEN exhibit_name = 'WorldBex' THEN 1 ELSE 0 END) AS worldbex_attendees,
                SUM(CASE WHEN exhibit_name = 'WorldBex' AND lead_status='New Lead' THEN 1 ELSE 0 END) AS 'New_Lead',
                SUM(CASE WHEN exhibit_name = 'WorldBex' AND lead_status<>'New Lead' AND lead_status<>'Converted'  THEN 1 ELSE 0 END) AS 'Active_Leads',
                SUM(CASE WHEN exhibit_name = 'WorldBex' AND lead_status='Converted' THEN 1 ELSE 0 END) AS 'Converted',
                COUNT(*) AS total_leads
            ")
            ->groupBy(DB::raw("YEAR(year_attended)"))
            ->orderBy('year_per_exhibit', 'desc')
            ->get();


            $reports_per_PhilConstruct = DB::table('attendees_list')
            ->selectRaw("
                YEAR(year_attended) AS year_per_exhibit,
                SUM(CASE WHEN exhibit_name = 'PhilConstruct' THEN 1 ELSE 0 END) AS PhilConstruct_attendees,
                SUM(CASE WHEN exhibit_name = 'PhilConstruct' AND lead_status='New Lead' THEN 1 ELSE 0 END) AS 'New_Lead',
                SUM(CASE WHEN exhibit_name = 'PhilConstruct' AND lead_status<>'New Lead' AND lead_status<>'Converted'  THEN 1 ELSE 0 END) AS 'Active_Leads',
                SUM(CASE WHEN exhibit_name = 'PhilConstruct' AND lead_status='Converted' THEN 1 ELSE 0 END) AS 'Converted',
                COUNT(*) AS total_leads
            ")
            ->groupBy(DB::raw("YEAR(year_attended)"))
            ->orderBy('year_per_exhibit', 'desc')
            ->get();


             $reports_per_PHA = DB::table('attendees_list')
            ->selectRaw("
                YEAR(year_attended) AS year_per_exhibit,
                SUM(CASE WHEN exhibit_name = 'PHA' THEN 1 ELSE 0 END) AS PHA_attendees,
                SUM(CASE WHEN exhibit_name = 'PHA' AND lead_status='New Lead' THEN 1 ELSE 0 END) AS 'New_Lead',
                SUM(CASE WHEN exhibit_name = 'PHA' AND lead_status<>'New Lead' AND lead_status<>'Converted'  THEN 1 ELSE 0 END) AS 'Active_Leads',
                SUM(CASE WHEN exhibit_name = 'PHA' AND lead_status='Converted' THEN 1 ELSE 0 END) AS 'Converted',
                COUNT(*) AS total_leads
            ")
            ->groupBy(DB::raw("YEAR(year_attended)"))
            ->orderBy('year_per_exhibit', 'desc')
            ->get();

       return view('reports.index', compact('reports', 'reports_per_WorldBex', 'reports_per_PhilConstruct','reports_per_PHA' ));
    }

}
