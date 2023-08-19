<?php
namespace App\Http\Controllers;

use App\Models\Ad; // Asegúrate de importar el modelo correcto
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
    
        $validatedData['is_visible'] = 0;
    
        $ad = new Ad($validatedData);
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('ad_images', 'public');
            $ad->image = $imagePath;
        }
    
        // Asociar el ID del usuario actual al anuncio
        $ad->user_id = auth()->user()->id;
    
        $ad->save();
    
        return redirect()->route('ads.create')->with('success', 'Ad created successfully.');
    }
    
    


    

    public function index(Request $request)
{
    $category = $request->input('category'); // Obtén la categoría seleccionada del formulario

    $query = Ad::query();

    if ($category) {
        $query->where('category', $category);
    }

    // Agregar condición para mostrar solo los anuncios con is_visible = 1
    $query->where('is_visible', 1);

    $ads = $query->orderBy('published_at', 'desc')->get();

    return view('ads.index', compact('ads'));
}

    
    public function show($id)
    {
        $ad = Ad::findOrFail($id); // Buscar el anuncio por su ID
        return view('ads.show', compact('ad'));
    }
    

    public function countNotVisibleAds()
{
    $count = Ad::where('is_visible', 0)->count();
    return $count;
}


public function destroy($id)
{
    $ad = Ad::findOrFail($id); // Buscar el anuncio por su ID
    $ad->delete();

    return redirect()->route('ads.index')->with('success', 'Ad deleted successfully.');
}

 
}
