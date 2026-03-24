<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\VehicleType;

class DashboardController extends Controller
{
    public function index()
    {
        // Count vehicles
        $vehicleCount = Vehicle::count();

        // Count vehicle types
        $vehicleTypeCount = VehicleType::count();

        return view('dashboard', compact('vehicleCount', 'vehicleTypeCount'));
    }
}