<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::latest()->paginate(10);
        return view('admin.notices.index', compact('notices'));
    }

    public function create()
    {
        return view('admin.notices.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'category' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('notices', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        Notice::create($data);

        return redirect()->route('admin.notices.index')->with('success', 'Noticia/Aviso creado exitosamente.');
    }

    public function edit(Notice $notice)
    {
        return view('admin.notices.edit', compact('notice'));
    }

    public function update(Request $request, Notice $notice)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'category' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($notice->image_path) {
                Storage::disk('public')->delete($notice->image_path);
            }
            $data['image_path'] = $request->file('image')->store('notices', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        $notice->update($data);

        return redirect()->route('admin.notices.index')->with('success', 'Noticia/Aviso actualizado exitosamente.');
    }

    public function destroy(Notice $notice)
    {
        if ($notice->image_path) {
            Storage::disk('public')->delete($notice->image_path);
        }
        $notice->delete();

        return redirect()->route('admin.notices.index')->with('success', 'Noticia/Aviso eliminado exitosamente.');
    }
}
