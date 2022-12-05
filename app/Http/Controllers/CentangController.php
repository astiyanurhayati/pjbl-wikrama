<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\DailyActivity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CentangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function form(){
        return view('dashboard.index');
    }

    public function index()
    {
        $activities = Activity::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();

        return view('dashboard.centang.index', compact('activities', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.input-form.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'activity_id' => 'required',
            'date' => 'required',
        ]);
        $checkDate = DailyActivity::where('student_id', Auth::user()->id)->where('date', $request->date)->first();
        if ($checkDate) {
            $request->session()->flash('error-add', $request->date);
            return Redirect::back();
        }
        $validated['student_id'] = Auth::user()->id;
        $validated['status'] = 0;
        $check = implode(",", $request->check);
        $validated['activity_id']= "," . $check . ",";
        DailyActivity::create($validated);
        $request->session()->flash('success-add');
        return redirect()->route('dashboard.pendidik.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
