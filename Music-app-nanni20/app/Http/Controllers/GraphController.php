<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GraphController extends Controller
{
    public function show()
    {
        // Example data; replace with your actual data logic
        $trackhistory = [
            [
                'queue_type' => 'Group A',
                'win_rates' => [60, 65, 70, 80, 75, 68, 72, 74, 78, 80]
            ],
            [
                'queue_type' => 'Group B',
                'win_rates' => [50, 55, 53, 57, 59, 60, 62, 65, 67, 70]
            ],
        ];

        // Pass the variable to the view
        return view('graph', compact('trackhistory'));
    }
}
