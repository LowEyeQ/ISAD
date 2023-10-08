<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use ArielMejiaDev\LarapexCharts\BarChart;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index()
    {
        $appointments = Appointment::selectRaw('hour(appointment_time) as hour, count(*) as count')
            ->groupBy('hour')
            ->get();

        // Prepare data for the chart
        $chart = new BarChart();
        $chart->setTitle('Appointment Count by Time Interval');
        $chart->setColors(['#8ccbff']);
        $chart->setWidth(500);

        // Initialize data arrays for each time interval
        $intervals = ['Midnight to 6 AM', '6 AM to Noon', 'Noon to 6 PM', '6 PM to Midnight'];
        $data = [0, 0, 0, 0];

        // Define an array of colors for each bar in the chart
        $colors = ['#FF5733', '#FFC300', '#33FF51', '#338BFF'];

        // Fill data based on the hour
        foreach ($appointments as $key => $appointment) {
            $hour = $appointment->hour;
            if ($hour >= 0 && $hour < 6) {
                $data[0] += $appointment->count;
            } elseif ($hour >= 6 && $hour < 12) {
                $data[1] += $appointment->count;
            } elseif ($hour >= 12 && $hour < 18) {
                $data[2] += $appointment->count;
            } elseif ($hour >= 18 && $hour < 24) {
                $data[3] += $appointment->count;
            }

            // Assign color based on the index

        }

        // Set X-axis labels
        $chart->setXAxis($intervals);
        // Add data to the chart
        $chart->addData('Appointment Count', $data);

        // return view('Services.appointment', compact('chart'));
        // return view('appointments-chart', compact('chart'));
    }
}







