<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a list of all users.
     */
    public function users(Request $request)
    {
        $query = User::where('is_admin', false);

        $showStudent = $request->boolean('role_student');
        $showAdvisor = $request->boolean('role_advisor');

        // Apply filter only if exactly one option is selected
        // If both are checked or neither is checked, we show all users
        if ($showStudent && !$showAdvisor) {
            $query->where('is_advisor', false);
        } elseif (!$showStudent && $showAdvisor) {
            $query->where('is_advisor', true);
        }

        $users = $query->latest()->get();
        return view('admin.users', compact('users'));
    }


    /**
     * Display a list of all articles with search functionality.
     */
    public function articles(Request $request)
    {
        $query = Article::with('student');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhereHas('student', function ($sq) use ($search) {
                        $sq->where('email', 'like', "%{$search}%");
                    });
            });
        }

        $articles = $query->latest()->get();
        return view('admin.articles', compact('articles'));
    }
}

