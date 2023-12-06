<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseStoreRequest;
use App\Http\Requests\CourseUpdateRequest;
use Illuminate\Auth\Access\AuthorizationException;

class AdminController extends Controller
{
    public function index()
    {
        // Your admin dashboard logic here
        $courses = Course::latest()->get();
        return view('admin.home',compact('courses'));
    }

    public function indexcourse()
    {
        $courses = Course::latest()->get();
        return view('admin.course', compact('courses'));
    }

    // CRUD for courses
    public function create()
    {
        return view('admin.coursecreate');
    }

    public function store(CourseStoreRequest $request)
    {
        try {
            if($request->validated()) {
                $user_id = auth()->id();
                $gambar = $request->file('gambar')->store('assets/course', 'public');
                Course::create($request->except('gambar') + ['gambar' => $gambar, 'user_id' => $user_id]);
            }
    
            return redirect()->route('course.index')->with([
                'message' => 'Course Berhasil Dibuat',
                'alert-type' => 'success'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('course.index')->with([
                'message' => 'Gagal membuat Course. Error: ' . $e->getMessage(),
                'alert-type' => 'danger'
            ]);
        }
    }

    public function edit(Course $course, User $user)
    {
        // Lanjutkan dengan tampilan edit tanpa melakukan otorisasi
        if (!$user || !($user->isAdmin() || $course->user_id === $user->id)) {
            return back()->withErrors(['error' => 'Anda tidak memiliki akses untuk mengedit.']);
        }

        return view('admin.courseedit', compact('course', 'user'));
    }

    public function updateImage(Request $request, $courseId)
    {
        $request->validate([
            'gambar' => 'required|image'
        ]);
        $course = Course::findOrFail($courseId);
        if ($request->gambar) {
            unlink('storage/' . $course->gambar);
            $gambar = $request->file('gambar')->store('assets/course', 'public');

            $course->update(['gambar' => $gambar]);
        }

        return redirect()->back()->with([
            'message' => 'Gambar Berhasil Diedit',
            'alert-type' => 'info'
        ]);
    }

    public function update(CourseUpdateRequest $request, $course)
    {
        if($request->validated()) {
            $course->update($request->validated());
        }

        return redirect()->route('course.index')->with([
            'message' => 'Data Berhasil Diedit',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Course $course)
    {
            if ($course->gambar) {
                unlink('storage/' . $course->gambar);
            }
    
            $course->delete();
    
            return redirect()->back()->with([
                'message' => 'Data Berhasil DiHapus',
                'alert-type' => 'danger'
            ]);
    }

    // CRUD for contents
    public function createContent()
    {
        // Show the form to create a new content
    }

    public function storeContent(Request $request)
    {
        // Store a new content
    }

    public function editContent(Content $content)
    {
        // Show the form to edit a content
    }

    public function updateContent(Request $request, Content $content)
    {
        // Update the content
    }

    public function destroyContent(Content $content)
    {
        // Delete the content
    }

    // User management
    public function listUsers()
    {
        $users = User::all();
        return view('admin.listUsers', compact('users'));
    }

    public function deleteUser(User $user)
    {
        try {
            // Hapus content terkait terlebih dahulu
            $user->contents()->delete();
    
            // Kemudian baru hapus user
            $user->delete();
    
            return redirect()->route('admin.user')->with('message', 'User deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('admin.user')->with('message', 'Failed to delete user. Error: ' . $e->getMessage());
        }
    }
}
