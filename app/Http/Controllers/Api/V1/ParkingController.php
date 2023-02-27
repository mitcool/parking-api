<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ParkingResource;
use App\Models\Parking;
use Illuminate\Http\Request;
use App\Services\PriceService;

class ParkingController extends Controller
{
    public function start(Request $request){

        $parkingData = $request->validate([
            'vehicle_id' => ['required','integer','exists:vehicles,id'],
            'zone_id' => ['required','integer','exists:zones,id']

        ]);

        $parking = Parking::create($parkingData);
        $parking->load('zone','vehicle');

        return ParkingResource::make($parking);
    }

    public function show(Parking $parking){
        return ParkingResource::make($parking);
    }

    public function stop(Parking $parking){
        $parking->update([
            'stop_time' => now(),
            'total_price' => PriceService::calculatePrice($parking->zone_id, $parking->start_time),
        ]);
    
        return ParkingResource::make($parking);
    }
}
