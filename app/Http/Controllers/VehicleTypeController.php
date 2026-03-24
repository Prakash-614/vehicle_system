<?php

namespace App\Http\Controllers;

use App\Models\VehicleType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types=VehicleType::all();
        return view('vehicle_type.index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vehicle_type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        VehicleType::create($request->all());
        return redirect()->route('vehicle-types.index')->with('success','Vehicle type created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(VehicleType $vehicleType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vehicleType = VehicleType::findOrFail($id);
        return view('vehicle_type.edit', compact('vehicleType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VehicleType $id)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $vehicleType->update($request->only('name'));
        return redirect()->route('vehicle-types.index')->with('success','Vehicle type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $vehicleType = VehicleType::findOrFail($id);
        $vehicleType->delete();
        return redirect()->route('vehicle-types.index')->with('success','Vehicle type deleted successfully');
    }
}