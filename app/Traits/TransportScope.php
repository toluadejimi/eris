<?php
namespace App\Traits;

use App\Models\Route;
use App\Models\Vehicle;
use Illuminate\Support\Arr;

trait TransportScope{

    public function getRouteNameById($id)
    {
        $route = Route::find($id);
        if ($route) {
            return $route->title;
        }else{
            return "Unknown";
        }
    }


    public function getVehicleById($id)
    {
        $vehicle = Vehicle::find($id);
        if ($vehicle) {
            return $vehicle->number;
        }else{
            return "Unknown";
        }
    }

    public function activeTransportRoutes()
    {
        $routes = Route::select('id','title')->Active()->pluck('title','id')->toArray();
        return Arr::prepend($routes, 'Select Route...', '0');
    }
}