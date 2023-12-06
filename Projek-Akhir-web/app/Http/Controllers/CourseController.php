<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseUpdateRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Requests\CourseStoreRequest;
use Illuminate\Auth\Access\AuthorizationException;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->middleware('admin');
        $courses = Course::latest()->get();

        return view('pengajar.course', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengajar.coursecreate');
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        try {
            $this->authorize('update', $course);
    
            // Lanjutkan dengan tampilan edit jika pengguna diotorisasi
            return view('pengajar.courseedit', compact('course'));
    
        } catch (AuthorizationException $e) {
            return redirect()->route('course.index')->with([
                'message' => 'Anda tidak diizinkan mengedit course ini.',
                'alert-type' => 'warning'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseUpdateRequest $request, Course $course)
    {
        if($request->validated()) {
            $course->update($request->validated());
        }

        return redirect()->route('course.index')->with([
            'message' => 'Data Berhasil Diedit',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        try {
            $this->authorize('delete', $course);
            if ($course->gambar) {
                unlink('storage/' . $course->gambar);
            }
            $course->delete();

            return redirect()->back()->with([
                'message' => 'Data Berhasil DiHapus',
                'alert-type' => 'danger'
            ]);
        } catch (AuthorizationException $e) {
            return redirect()->route('course.index')->with([
                'message' => 'Anda tidak diizinkan menghapus course ini.',
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
}
