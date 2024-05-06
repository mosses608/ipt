<?php

namespace App\Http\Controllers;

use App\Models\Completeapplication;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    //
    public function generateChart()
    {
        $completeApplications = Completeapplication::all(); // Use the correct model name

        $firmRegistrations = [];
        foreach ($completeApplications as $application) {
            $firmName = $application->firm_name;
            if (!isset($firmRegistrations[$firmName])) {
                $firmRegistrations[$firmName] = 0;
            }
            $firmRegistrations[$firmName]++;
        }

        // Format data for the chart
        $labels = [];
        $data = [];
        foreach ($firmRegistrations as $firmName => $totalStudents) {
            $labels[] = $firmName;
            $data[] = $totalStudents;
        }

        // Now $labels contains the firm names and $data contains the corresponding student counts

        // Pass $labels and $data to a view to render the chart
        return view('chart', compact('labels', 'data'));
    }
}
