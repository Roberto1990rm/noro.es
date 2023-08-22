<?php

namespace App\Http\Controllers;
use App\Models\Ad; // Asegúrate de importar el modelo correcto
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\RelatedImage;

class HomeController extends Controller
{
  
    public function index(Request $request)
{
    $latestAds1 = Ad::orderBy('created_at', 'desc')->take(5)->get();
    $latestAds = Ad::orderBy('likes_count', 'desc')->take(5)->get();

    $selectedCategory = $request->input('category');
    $category = $request->input('category');
    $searchTerm = $request->input('search'); // Obtener el término de búsqueda
    $query = Ad::query();

    if ($category) {
        $query->where('category', $category);
    }

    if ($searchTerm) {
        $query->where(function ($q) use ($searchTerm) {
            $q->where('category', 'like', '%' . $searchTerm . '%')
              ->orWhere('content', 'like', '%' . $searchTerm . '%')
              ->orWhere('created_at', 'like', '%' . $searchTerm . '%')
              ->orWhere('title', 'like', '%' . $searchTerm . '%')
              ->orWhere('subtitle', 'like', '%' . $searchTerm . '%')
              ->orWhere('video_url', 'like', '%' . $searchTerm . '%');
        });
    }

    $ads = $query->orderBy('created_at', 'desc')->get();

    return view('ads.index', compact('ads', 'selectedCategory', 'latestAds', 'latestAds1'));
}
}

    


   

