<?php

namespace App\Http\Controllers;

use App\Models\GraduationProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function dashboard()
    {
        $projects = auth()->user()->graduationProjects;
        return view('student.dashboard', compact('projects'));
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|min:10|max:200',
        'description' => 'required|string|min:50|max:2000',
        'advisor' => 'required|string|max:100',
        'career' => 'required|string|max:100',
        'year' => 'required|integer|min:2000|max:' . (date('Y') + 1),
        'keywords' => 'nullable|string|max:200',
        'defense_date' => 'nullable|date',
        'file' => 'required|file|mimes:pdf,doc,docx|max:20480', // 20MB
    ], [
        'file.max' => 'El archivo no debe ser mayor a 20MB.',
        'file.mimes' => 'El archivo debe ser PDF, DOC o DOCX.',
    ]);
        $filePath = $request->file('file')->store('graduation_projects', 'public');

        GraduationProject::create([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'description' => $validated['description'],
            'advisor' => $validated['advisor'],
            'career' => $validated['career'],
            'year' => $validated['year'],
            'keywords' => $validated['keywords'],
            'defense_date' => $validated['defense_date'],
            'file_path' => $filePath,
            'status' => 'pending',
        ]);

        return redirect('/student/dashboard')->with('success', 'Trabajo de graduación registrado exitosamente.');
    }

    public function show(GraduationProject $project)
    {
        // Verificar que el proyecto pertenece al usuario autenticado
        if ($project->user_id !== auth()->id()) {
            abort(403, 'No tienes permiso para ver este proyecto.');
        }
        
        return view('student.show', compact('project'));
    }

    public function edit(GraduationProject $project)
    {
        // Verificar que el proyecto pertenece al usuario autenticado
        if ($project->user_id !== auth()->id()) {
            abort(403, 'No tienes permiso para editar este proyecto.');
        }
        
        return view('student.edit', compact('project'));
    }

    public function update(Request $request, GraduationProject $project)
    {
        // Verificar que el proyecto pertenece al usuario autenticado
        if ($project->user_id !== auth()->id()) {
            abort(403, 'No tienes permiso para actualizar este proyecto.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'advisor' => 'required|string|max:255',
            'career' => 'required|string|max:255',
            'year' => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'keywords' => 'nullable|string',
            'defense_date' => 'nullable|date',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
        ]);

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($project->file_path);
            $validated['file_path'] = $request->file('file')->store('graduation_projects', 'public');
        }

        $project->update($validated);

        return redirect('/student/dashboard')->with('success', 'Trabajo actualizado exitosamente.');
    }
}