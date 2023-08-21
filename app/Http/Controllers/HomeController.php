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
        $latestAds = Ad::orderBy('created_at', 'desc')->take(10)->get();
    
        return view('welcome', compact('latestAds'));
    }
    
    
    


   
}
