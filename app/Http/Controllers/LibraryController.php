<?php

namespace App\Http\Controllers;

use App\Models\LibraryResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LibraryController extends Controller
{
    /**
     * Display a listing of library resources.
     */
    public function index()
    {
        $resources = LibraryResource::latest()->get()->groupBy('category');
        return view('library.index', compact('resources'));
    }

    /**
     * Store a newly created resource in storage (Admin only).
     */
    public function store(Request $request)
    {
        if (!Auth::user()->is_admin) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|in:plantilla,guía,reglamento,otro',
            'file' => 'required|file|max:10240', // 10MB max
        ]);

        $path = $request->file('file')->store('library', 'public');

        LibraryResource::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'file_path' => $path,
        ]);

        return redirect()->back()->with('success', 'Recurso añadido a la librería.');
    }

    /**
     * Remove the specified resource from storage (Admin only).
     */
    public function destroy(LibraryResource $resource)
    {
        if (!Auth::user()->is_admin) {
            abort(403);
        }

        if ($resource->file_path) {
            Storage::disk('public')->delete($resource->file_path);
        }

        $resource->delete();

        return redirect()->back()->with('success', 'Recurso eliminado de la librería.');
    }
}
