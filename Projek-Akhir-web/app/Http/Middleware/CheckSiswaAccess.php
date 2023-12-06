<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSiswaAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $routeCourseId = $request->route('course'); // Ambil parameter 'course' dari URL
        $siswaCourseId = auth()->user()->courses->pluck('id')->toArray(); // Ambil ID course yang dimiliki siswa

        if (!in_array($routeCourseId, $siswaCourseId)) {
            // Jika ID course pada URL tidak ada di daftar course siswa, redirect atau berikan pesan error sesuai kebutuhan
            return redirect()->route('siswa')->with([
                'message' => 'You do not have access to this lesson page.',
                'alert-type' => 'error'
            ]);
        }

        return $next($request);
    }
}
