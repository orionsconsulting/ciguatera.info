<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reporting;

class HomeController extends Controller
{
    public function search(Request $request) {
        $searchTerm = array_merge(explode(' ', $request->location), explode(',', $request->location));
        
        foreach ($searchTerm as $s) {
            if(!isset($reportingQuery)) {
                $reportingQuery = Reporting::where("location", "like", "%".$s."%");
            } else {
                $reportingQuery->orWhere("location", "like", "%".$s."%");
            }
        }
    
        $reports = $reportingQuery
            ->select('date', 'species', 'location')
            ->groupBy('date', 'species', 'location')
            ->orderBy('date', 'desc')
            ->get();

        return view('welcome', ['reports' => $reports]);
    }

    public function report(Request $request) {
        Reporting::create([
            'date' => $request->date,
            'location' => $request->location,
            'species' => $request->species,
        ]);

        return view('welcome');
    }
}
