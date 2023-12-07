<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CourseStoreRequest;
use App\Http\Requests\ContentStoreRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Http\Requests\ContentUpdateRequest;
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
    
            return redirect()->route('admin.course')->with([
                'message' => 'Course Berhasil Dibuat',
                'alert-type' => 'success'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('admin.course')->with([
                'message' => 'Gagal membuat Course. Error: ' . $e->getMessage(),
                'alert-type' => 'danger'
            ]);
        }
    }

    public function edit(Course $course)
    {
        try {
            $this->authorize('update', $course);
    
            // Lanjutkan dengan tampilan edit jika pengguna diotorisasi
            return view('admin.courseedit', compact('course'));
    
        } catch (AuthorizationException $e) {
            return redirect()->route('admin.course')->with([
                'message' => 'Anda tidak diizinkan mengedit course ini.',
                'alert-type' => 'warning'
            ]);
        }
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

        return redirect()->route('admin.course')->with([
            'message' => 'Data Berhasil Diedit',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Course $course)
    {
        try {
            $this->authorize('delete', $course);
    
            // Hapus semua content yang terkait dengan course
            foreach ($course->contents as $content) {
    
                $content->delete();
            }
    
            // Hapus gambar course jika ada
            if ($course->gambar) {
                Storage::delete('public/' . $course->gambar);
            }
    
            // Hapus course
            $course->delete();
    
            return redirect()->back()->with([
                'message' => 'Data Berhasil DiHapus berserta isinya',
                'alert-type' => 'danger'
            ]);
        } catch (AuthorizationException $e) {
            return redirect()->route('course.index')->with([
                'message' => 'Anda tidak diizinkan menghapus course ini.',
                'alert-type' => 'warning'
            ]);
        }
    }  
    
    public function indexcontent()
    {
        $contents = Content::latest()->get();
        return view('admin.content', compact('contents'));
    }

    // CRUD for contents
    public function createContent()
    {
        $user_id = auth()->id();
        $contents = Course::where('user_id', $user_id)->get();

        return view('admin.contentcreate', compact('contents'));
    }

    public function storecontent(ContentStoreRequest $request)
    {
        try {
            $validatedData = $request->validated();
    
            // Mendapatkan user_id dari pengguna yang sedang login
            $user_id = auth()->id();
    
            // Menyimpan data ke dalam tabel contents
            $content = new Content;
            $content->user_id = $user_id;
            $content->course_id = $validatedData['course_id'];
            $content->judul = $validatedData['judul'];
            $content->materi = $validatedData['materi'];
            $content->save();
    
            return redirect()->route('admin.content')->with([
                'message' => 'Content Berhasil Dibuat',
                'alert-type' => 'success'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('admin.content')->with([
                'message' => 'Gagal membuat Content. Error: ' . $e->getMessage(),
                'alert-type' => 'danger'
            ]);
        }
    }

    public function editContent(Content $content)
    {
        try {
            $this->authorize('update', $content);
        
            // Lanjutkan dengan tampilan edit jika pengguna diotorisasi
            return view('admin.contentedit', compact('content'));
        
        } catch (AuthorizationException $e) {
            return redirect()->route('admin.content')->with([
                'message' => 'Anda tidak diizinkan mengedit content ini.',
                'alert-type' => 'warning'
            ]);
        }
    }

    public function updateContent(ContentUpdateRequest $request, Content $content)
    {
        if($request->validated()) {
            $content->update($request->validated());
        }

        return redirect()->route('admin.content')->with([
            'message' => 'Content Berhasil Diedit',
            'alert-type' => 'info'
        ]);
    }

    public function destroyContent(Content $content)
    {
        try {
            $this->authorize('delete', $content);
            $content->delete();

            return redirect()->back()->with([
                'message' => 'Content Berhasil DiHapus',
                'alert-type' => 'danger'
            ]);
        } catch (AuthorizationException $e) {
            return redirect()->route('admin.content')->with([
                'message' => 'Anda tidak diizinkan menghapus content ini.',
                'alert-type' => 'warning'
            ]);
        }
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
            // Hapus semua content terkait user
            $user->contents()->delete();
    
            // Hapus semua course terkait user
            $user->courses()->each(function ($course) {
                // Hapus gambar terkait course
                if ($course->gambar) {
                    unlink('storage/' . $course->gambar);
                }
                $course->delete();
            });
    
            // Hapus user
            $user->delete();
    
            return redirect()->route('admin.user')->with('message', 'User deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('admin.user')->with('message', 'Failed to delete user. Error: ' . $e->getMessage());
        }
    }
    
}
