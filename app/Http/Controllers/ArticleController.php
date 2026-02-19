<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->is_advisor) {
            // Advisor sees articles assigned to them or all (based on preference)
            // For now, let's show all articles where they are the advisor
            $articles = Article::where('advisor_id', $user->id)->latest()->get();
        } else {
            // Student sees their own articles
            $articles = Article::where('user_id', $user->id)->latest()->get();
        }

        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        $advisors = User::where('is_advisor', true)->get();
        return view('articles.create', compact('advisors'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'title' => 'required|string|max:255',
            'students' => 'required|string',
            'year' => 'required|integer|min:2000|max:' . date('Y'),
            'career' => 'required|string|max:255',
            'pdf_file' => 'required|mimes:pdf|max:10240',
        ];

        if ($user->is_advisor) {
            $rules['student_email'] = 'required|email|exists:users,email';
        } else {
            $rules['advisor_id'] = 'required|exists:users,id';
        }

        $request->validate($rules);

        $path = $request->file('pdf_file')->store('articles', 'public');

        $data = [
            'title' => $request->title,
            'students' => $request->students,
            'year' => $request->year,
            'career' => $request->career,
            'pdf_path' => $path,
            'status' => 'revisión',
        ];

        if ($user->is_advisor) {
            $student = User::where('email', $request->student_email)->first();
            $data['user_id'] = $student->id;
            $data['advisor_id'] = $user->id;
        } else {
            $data['user_id'] = $user->id;
            $data['advisor_id'] = $request->advisor_id;
        }

        Article::create($data);

        return redirect()->route('articles.index')->with('success', 'Articulo subido con éxito.');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        $user = Auth::user();

        // Check permissions: Student owner or assigned Advisor
        if ($user->id !== $article->user_id && $user->id !== $article->advisor_id && !$user->is_admin) {
            abort(403);
        }

        $advisors = User::where('is_advisor', true)->get();
        return view('articles.edit', compact('article', 'advisors'));
    }

    public function update(Request $request, Article $article)
    {
        $user = Auth::user();

        // Check permissions
        if ($user->id !== $article->user_id && $user->id !== $article->advisor_id && !$user->is_admin) {
            abort(403);
        }

        $rules = [
            'title' => 'required|string|max:255',
            'students' => 'required|string',
            'year' => 'required|integer|min:2000|max:' . date('Y'),
            'career' => 'required|string|max:255',
            'pdf_file' => 'nullable|mimes:pdf|max:10240',
        ];

        // Only students can change advisor during edit if needed? 
        // Actually, let's keep it simple for now and not change roles during edit unless needed.
        if ($user->is_advisor) {
            $rules['student_email'] = 'required|email|exists:users,email';
        } elseif (!$user->is_admin) {
            $rules['advisor_id'] = 'required|exists:users,id';
        }

        $request->validate($rules);

        $data = [
            'title' => $request->title,
            'students' => $request->students,
            'year' => $request->year,
            'career' => $request->career,
        ];

        if ($user->is_advisor) {
            $student = User::where('email', $request->student_email)->first();
            $data['user_id'] = $student->id;
        }

        if ($request->hasFile('pdf_file')) {
            // Delete old file
            if ($article->pdf_path) {
                Storage::disk('public')->delete($article->pdf_path);
            }
            $data['pdf_path'] = $request->file('pdf_file')->store('articles', 'public');
        }

        if (isset($rules['advisor_id'])) {
            $data['advisor_id'] = $request->advisor_id;
        }

        $article->update($data);

        return redirect()->route('articles.show', $article)->with('success', 'Articulo actualizado con éxito.');
    }

    public function evaluate(Request $request, Article $article)
    {
        if (!Auth::user()->is_advisor || Auth::id() !== $article->advisor_id) {
            abort(403);
        }

        $request->validate([
            'status' => 'required|in:aprobado,revisión,rechazado',
            'comments' => 'nullable|string',
        ]);

        $article->update([
            'status' => $request->status,
            'comments' => $request->comments,
        ]);

        return redirect()->route('articles.index')->with('success', 'Evaluación guardada.');
    }
}
