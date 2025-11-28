<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Article;
use App\Models\Gallery;


class HomeController extends Controller
{
    
    //Display page with services

    public function showServicePage()
    {
        $services = Service::orderBy('created_at', 'desc')->paginate(6);
        $message = $services->isEmpty() ? 'No services to display' : null;

        return view('services', compact('services', 'message'));
    }

    public function showArticlePage()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(4);
        $message = $articles->isEmpty() ? 'No services to show': null;

        return view('articles', compact(['articles', 'message']));
    }
    public function showGalleryPage()
    {
        $galleries = Gallery::orderBy('created_at', 'desc')->paginate(4);
        $message = $galleries->isEmpty() ? 'No galleries to show': null;

        return view('galleries', compact(['galleries', 'message']));
    }

}
