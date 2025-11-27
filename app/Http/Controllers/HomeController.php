<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Article;


class HomeController extends Controller
{
    
    //Display page with services

    public function showServicePage()
    {
        $services = Service::orderBy('created_at', 'desc')->paginate(6);
        $message = $services->isEmpty() ? 'No services to display' : null;

        return view('services', compact('services', 'message'));
    }

    public function show()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(4);
        $message = $articles->isEmpty() ? 'No services to show': null;

        return view('articles', compact(['articles', 'message']));
    }

}
