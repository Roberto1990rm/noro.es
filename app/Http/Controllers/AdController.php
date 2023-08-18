<?php
namespace App\Http\Controllers;

use App\Models\Ad; // Asegúrate de importar el modelo correcto
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdController;
class AdController extends Controller
{
    // ...

    public function create()
    {
        return view('ads.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'content' => 'required|string',
            'category' => 'required|in:nacional,internacional,politica,economia,tecnologia,moda,cultura,entretenimiento,ciencia,motor',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $ad = new Ad($validatedData);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('ad_images', 'public');
            $ad->image = $imagePath;
        }

        $ad->save();

        return redirect()->route('ads.create')->with('success', 'Ad created successfully.');
    }


    

    public function index()
    {
        $ads = Ad::all(); // Obtén todos los anuncios
        return view('ads.index', compact('ads'));
    }
}
