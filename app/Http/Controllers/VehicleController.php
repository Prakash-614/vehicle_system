<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VehicleType;
class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles=Vehicle::with('type')->get();
        return view('vehicle.index',compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types=VehicleType::all();
        return view('vehicle.create',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Vehicle::create($request->all());
        return redirect()->route('vehicles.index')->with('success','Vehicle created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($_COOKIEid)
     {
        $vehicle = Vehicle::findOrFail($_COOKIE['id']);
        return view('vehicle.show', compact('vehicle'));
     }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $types=VehicleType::all();
        return view('vehicle.edit', compact('vehicle','types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $request->validate([
            'name'=>'required',
            'vehicle_type'=>'required|exists:vehicle_types,id'
        ]);
        $vehicle->update($request->all());
        return redirect()->route('vehicles.index')->with('success','Vehicle updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
     {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success','Vehicle deleted successfully');
    {
        
    }
    }
}