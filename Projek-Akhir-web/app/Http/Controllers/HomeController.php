<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->get();
        return view('home', compact('courses'));
    }

    public function siswa(){
        $this->middleware('admin');
        $courses = Course::latest()->get();
        return view('siswa.siswa', compact('courses'));
    }

    public function lesson(Course $course)
{
    // Dapatkan konten dari course
    $contents = $course->contents;

    return view('siswa.lesson', compact('course', 'contents'));
}

    public function indexsiswa($courseId) {
        $course = Course::findOrFail($courseId);
        return view('siswa.coursecatalog', compact('course'));
    }

    public function siswaprofile() {
        $courses = Course::latest()->get();
        return view('siswa.profile', compact('courses'));
    }

    public function siswaupdateProfile(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Update the user's name and email
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Update the password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Save the changes
        $user->save();

        return redirect()->route('siswa')->with([
            'message' => 'Profile successfully updated.',
            'alert-type' => 'success'
        ]);
    }

    public function pengajar(){
        $this->middleware('admin');
        $courses = Course::latest()->get();
        return view('pengajar.home', compact('courses'));
    }

    public function pengajarprofile()
    {
        return view('pengajar.profile');
    }

    public function pengajarupdateProfile(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Update the user's name and email
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Update the password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Save the changes
        $user->save();

        return redirect()->route('pengajar')->with([
            'message' => 'Profile successfully updated.',
            'alert-type' => 'success'
        ]);
    }

    public function search(Request $request)
    {
        $nama = $request->input('nama'); // Ambil nilai yang diinputkan pengguna
    
        $courses = Course::where('nama', 'like', '%' . $nama . '%')->get();

    
        return view('pengajar.search', ['cars' => $courses], compact('courses'));
    }
}
