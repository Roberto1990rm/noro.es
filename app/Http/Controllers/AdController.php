<?php
namespace App\Http\Controllers;

use App\Models\Ad; // Asegúrate de importar el modelo correcto
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\RelatedImage;
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_url' => 'nullable',
            'related_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation for related images
        ]);
    
        $validatedData['is_visible'] = 0;
    
        $ad = new Ad($validatedData);
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('ad_images', 'public');
            $ad->image = $imagePath;
        }
    
        if ($request->filled('video_url')) {
            $ad->video_url = $request->input('video_url');
        }
    
        // Asociar el ID del usuario actual al anuncio
        $ad->user_id = auth()->user()->id;
    
        $ad->save();
    
        $relatedImagePaths = [];
    
        if ($request->hasFile('related_images')) {
            foreach ($request->file('related_images') as $relatedImage) {
                $imagePath = $relatedImage->store('related_images', 'public');
                $relatedImagePaths[] = $imagePath;
            }
    
            foreach ($relatedImagePaths as $imagePath) {
                $relatedImage = new RelatedImage([
                    'image_path' => $imagePath,
                    'ad_id' => $ad->id,
                ]);
    
                $relatedImage->save();
            }
        }
    
        return redirect()->route('ads.create')->with('success', 'Ad created successfully.');
    }
    

    public function index(Request $request)
    {
        $selectedCategory = $request->input('category');
        $category = $request->input('category'); // Obtener la categoría del filtro
        $query = Ad::query();
    
        if ($category) {
            $query->where('category', $category);
        }
    
        $ads = $query->orderBy('created_at', 'desc')->get();
    
        return view('ads.index', compact('ads','selectedCategory'));
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

public function edit($id)
{
    $ad = Ad::findOrFail($id);

    if ($ad->user_id !== Auth::user()->id) {
        return redirect()->route('ads.index')->with('error', 'You do not have permission to edit this ad.');
    }

    return view('ads.edit', compact('ad'));
}


public function update(Request $request, $id)
{
    $ad = Ad::findOrFail($id);

    // Verifica si el usuario actual es el creador del anuncio
    if ($ad->user_id !== Auth::user()->id) {
        return redirect()->route('ads.index')->with('error', 'You do not have permission to edit this ad.');
    }

    // Valida los datos del formulario de edición
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'subtitle' => 'nullable|string|max:255',
        'content' => 'required|string',
        'category' => 'required|in:nacional,internacional,politica,economia,tecnologia,moda,cultura,entretenimiento,ciencia,motor',
    ]);

    // Actualiza los campos del anuncio con los datos validados
    $ad->update($validatedData);

    // Establece el valor de is_visible en 0
    $ad->is_visible = 0;
    $ad->save();

    return redirect()->route('ads.index')->with('success', 'Ad updated successfully.');
}


public function showMyAds(Request $request)
{
    $selectedCategory = $request->input('category');
    $userId = Auth::user()->id;
    $ads = Ad::where('user_id', $userId)->get();
    
    return view('ads.index', compact('ads', 'selectedCategory'));
}


public function destroy($id)
{
    $ad = Ad::findOrFail($id); // Buscar el anuncio por su ID
    $ad->delete();

    return redirect()->route('ads.index')->with('success', 'Ad deleted successfully.');
}





public function likeAd($id)
{
    $ad = Ad::findOrFail($id);

    // Verificar si el usuario ya ha dado me gusta
    $userHasLiked = $ad->likes()->where('user_id', Auth::user()->id)->exists();

    if (!$userHasLiked) {
        $ad->increment('likes_count');

        // Crear una nueva relación en la tabla pivot de likes
        $ad->likes()->attach(Auth::user()->id);
    }

    return redirect()->back()->with('success', 'You liked this ad.');
}




// ...

public function storeComment(Request $request, $id)
{
    $ad = Ad::findOrFail($id);

    $request->validate([
        'content' => 'required|max:500',
    ]);

    $comment = new Comment([
        'content' => $request->input('content'),
    ]);

    $comment->ad()->associate($ad);
    $comment->user()->associate(auth()->user());
    $comment->save();

    return redirect()->back()->with('success', 'Comment added successfully.');
}

public function destroyComment($ad_id, $comment_id)
{
    $ad = Ad::findOrFail($ad_id);
    $comment = Comment::findOrFail($comment_id);

    if (Auth::user()->is_revisor || Auth::user()->id === $comment->user_id) {
        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully.');
    } else {
        return redirect()->back()->with('error', 'You do not have permission to delete this comment.');
    }
}



 
}
