<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Resume;

class AdminController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $resumesCount = Resume::count();
        return view('admin.dashboard', compact('usersCount', 'resumesCount'));
    }

    public function users()
    {
        $users = User::latest()->paginate(15);
        return view('admin.users', compact('users'));
    }

    public function resumes()
    {
        $resumes = Resume::with('user')->latest()->paginate(15);
        return view('admin.resumes', compact('resumes'));
    }

    public function destroyUser(User $user)
    {
        // Don't delete self just in case
        if (auth()->id() !== $user->id) {
            $user->delete();
        }
        return redirect()->route('admin.users')->with('success', 'User deleted.');
    }

    public function destroyResume(Resume $resume)
    {
        $resume->delete();
        return redirect()->route('admin.resumes')->with('success', 'Resume deleted.');
    }
}
