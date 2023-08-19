<?php

namespace App\Http\Controllers;
use App\Models\Ad;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $latestAds = Ad::where('is_visible', 1)
            ->orderBy('published_at', 'desc')
            ->take(4) // Obtener solo los últimos 4 anuncios visibles
            ->get();
    
        return view('welcome', compact('latestAds'));
    }
    
    
    


   
}
