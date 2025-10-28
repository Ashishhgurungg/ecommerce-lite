<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Service;

class ServiceController extends Controller
{
    public function show(){
        $services = Service::all();
        return view('services', ["services"=> $services]);
    }
}
