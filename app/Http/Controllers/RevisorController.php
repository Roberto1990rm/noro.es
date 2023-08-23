<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use Illuminate\Pagination\Paginator;
class RevisorController extends Controller
{
    public function index()
{
    paginator::useBootstrapFive();
    $ads = Ad::paginate(15); // Obtener los anuncios paginados en grupos de 15
    return view('revisor', compact('ads'));
}

    public function updateVisibility(Request $request, $id)
    {
        $ad = Ad::findOrFail($id);
    
        // Alternar el valor actual de is_visible
        $ad->update([
            'is_visible' => !$ad->is_visible,
        ]);
    
        return redirect()->route('revisor.index')->with('success', 'Ad visibility updated successfully.');
    }
    
    
    
    
    
    

    
}

