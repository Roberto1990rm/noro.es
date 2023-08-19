<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function assignRevisor(User $user)
    {
        // Verifica que el usuario no sea ya un revisor
        if ($user->is_revisor) {
            return redirect()->route('admin.users.index')->with('warning', 'User is already a revisor.');
        }
    
        // Asigna el rol de revisor al usuario
        $user->is_revisor = true;
        $user->save();
    
        return redirect()->route('admin.users.index')->with('success', 'User role updated successfully.');
    }
    

    public function removeRevisor(User $user)
{
    $user->is_revisor = false;
    $user->save();

    return redirect()->route('admin.users.index')->with('success', 'Revisor role removed successfully.');
}

    
}
