<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ContentStoreRequest;
use App\Http\Requests\ContentUpdateRequest;
use Illuminate\Auth\Access\AuthorizationException;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->middleware('admin');
        $contents = Content::latest()->get();

        return view('pengajar.content', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user_id = auth()->id();
        $contents = Course::where('user_id', $user_id)->get();

        return view('pengajar.contentcreate', compact('contents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContentStoreRequest $request)
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
    
            return redirect()->route('content.index')->with([
                'message' => 'Content Berhasil Dibuat',
                'alert-type' => 'success'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('content.index')->with([
                'message' => 'Gagal membuat Content. Error: ' . $e->getMessage(),
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
    public function edit(Content $content)
    {
        try {
            $this->authorize('update', $content);
        
            // Lanjutkan dengan tampilan edit jika pengguna diotorisasi
            return view('pengajar.contentedit', compact('content'));
        
        } catch (AuthorizationException $e) {
            return redirect()->route('content.index')->with([
                'message' => 'Anda tidak diizinkan mengedit content ini.',
                'alert-type' => 'warning'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContentUpdateRequest $request, Content $content)
    {
        if($request->validated()) {
            $content->update($request->validated());
        }

        return redirect()->route('content.index')->with([
            'message' => 'Content Berhasil Diedit',
            'alert-type' => 'info'
        ]);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Content $content)
    {
        try {
            $this->authorize('delete', $content);
            $content->delete();

            return redirect()->back()->with([
                'message' => 'Content Berhasil DiHapus',
                'alert-type' => 'danger'
            ]);
        } catch (AuthorizationException $e) {
            return redirect()->route('content.index')->with([
                'message' => 'Anda tidak diizinkan menghapus content ini.',
                'alert-type' => 'warning'
            ]);
        }
    }
}
