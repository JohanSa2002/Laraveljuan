<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PublicProfileController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'No se ha encontrado un usuario con ese correo electrónico.');
        }

        return redirect()->route('profile.public.show', $user->id);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        // Assuming 'approved' or similar status exists. Adjust if status logic differs.
        // Assuming users are related to articles via 'user_id' (authorship).
        $articles = \App\Models\Article::where('user_id', $user->id)
            ->where('status', 'aprobado') // Adjust status value based on Article model/logic
            ->orderBy('created_at', 'desc')
            ->get();

        return view('profile.public', compact('user', 'articles'));
    }
}
