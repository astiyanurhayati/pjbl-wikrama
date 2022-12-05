<?php

namespace App\Http\Controllers;

use App\Models\DailyActivity;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use App\Models\Grade;
use App\Models\Region;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

    class DashboardController extends Controller
{
    public function index()
    {
        $pembiasaan =  DailyActivity::where('student_id', Auth::user()->id)->get();
        $job =  Job::where('student_id', Auth::user()->id)->get();
        $siswa = User::all();
        $grades = Grade::orderBy('name')->get();
        $regions = Region::all();

     
        return view('dashboard.welcome_teacher', compact('pembiasaan', 'job', 'regions', 'grades', 'siswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'start_jp' => 'required',
            'end_jp' => 'required',
            'content' => 'required|min:8',
        ]);

        $duration = Carbon::parse($request->end_jp)->diffInMinutes(Carbon::parse($request->start_jp));

        $check = Job::where([
            ['date', '=', $request->date],
            ['student_id', '=', Auth::user()->id],
        ])->first();

        if (is_null($check)) {
            Job::create([
                'date' => $request->date,
                'start_jp' => $request->start_jp,
                'end_jp' => $request->end_jp,
                'content' => $request->content,
                'duration' => $duration,
                'student_id' => Auth::user()->id,
            ]);

            return to_route('dashboard.pendidik2.index')->with('success', 'Berhasil menambahkan deskripsi pekerjaan untuk hari ini!');
        } else {
            return to_route('dashboard')->with('failed', 'Deskripsi pekerjaan untuk tanggal tersebut sudah tersedia!');
        }
    }
}
