<?php

namespace App\Http\Controllers;

use App\Models\GraduationProject;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $projects = GraduationProject::with('user')->latest()->paginate(20);
        $stats = [
            'total' => GraduationProject::count(),
            'pending' => GraduationProject::where('status', 'pending')->count(),
            'approved' => GraduationProject::where('status', 'approved')->count(),
            'rejected' => GraduationProject::where('status', 'rejected')->count(),
        ];
        return view('admin.dashboard', compact('projects', 'stats'));
    }

    public function show(GraduationProject $project)
    {
        $project->load('user');
        return view('admin.show', compact('project'));
    }

    public function updateStatus(Request $request, GraduationProject $project)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,approved,rejected',
            'admin_comments' => 'nullable|string',
        ]);

        $project->update($validated);

        return redirect('/admin/dashboard')->with('success', 'Estado actualizado exitosamente.');
    }

    public function students()
    {
        $students = User::where('role', 'student')
            ->get()
            ->map(function($student) {
                $student->graduation_projects_count = $student->graduationProjects()->count();
                return $student;
            });
        
        // Paginar manualmente
        $currentPage = request()->get('page', 1);
        $perPage = 20;
        $students = new \Illuminate\Pagination\LengthAwarePaginator(
            $students->forPage($currentPage, $perPage),
            $students->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url()]
        );

        return view('admin.students', compact('students'));
    }

    public function search(Request $request)
    {
        $query = GraduationProject::with('user');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('keywords', 'like', "%{$search}%")
                  ->orWhere('advisor', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('career')) {
            $query->where('career', $request->career);
        }

        if ($request->filled('year')) {
            $query->where('year', $request->year);
        }

        $projects = $query->latest()->paginate(20);

        return view('admin.search', compact('projects'));
    }
}