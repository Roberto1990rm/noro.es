<?php

namespace App\Http\Controllers;
use App\Models\Ad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\RelatedImage;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $latestAds = Ad::orderBy('created_at', 'desc')->take(3)->get();

        $category = $request->input('category');
        $selectedCategory = $request->input('category');

        // Obtén los anuncios que necesitas para la vista y asigna la variable $ads
        $ads = Ad::where('category', $selectedCategory)->get();

        return view('welcome', compact('latestAds', 'selectedCategory', 'category', 'ads'));
    }
}
    


   

