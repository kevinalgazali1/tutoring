<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiswaController extends Controller
{
    public function index() {
        return view('siswa.coursecatalog');
    }

    public function profile() {
        return view('siswa.profile');
    }

    public function showLessonContent(Course $course, Content $content)
{
    return view('siswa.lessoncontent', compact('course', 'content'));
}
}
