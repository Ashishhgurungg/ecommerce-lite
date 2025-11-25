<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;


class HomeController extends Controller
{
    
    //Display page with services

    public function showServicePage()
    {
        $services = Service::orderBy('created_at', 'desc')->paginate(6);
        $message = $services->isEmpty() ? 'No services to display' : null;

        return view('services', compact('services', 'message'));
    }

}
