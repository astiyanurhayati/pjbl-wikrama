<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use App\Models\Region;
use App\Models\Student;
use App\Models\Activity;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\DailyActivity;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class StudentTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $students = Student::filter(['grade' => $request->query('grade')])->get();
        // $students = Student::all();
        $grades = Grade::orderBy('name')->get();
        $regions = Region::orderBy('name')->get();

        return view('dashboard.input-table.index', compact('students', 'grades', 'regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::orderBy('name')->get();
        $regions = Region::orderBy('name')->get();

        return view('dashboard.input-table.create', compact('grades', 'regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string'],
            'nis' => ['required'],
            'grade_id' => ['required', 'exists:grades,id'],
            'region_id' => ['required', 'exists:regions,id'],
            'username' => ['required', 'string', 'alpha_dash', 'unique:users,username', 'min:6'],
            'password' => ['required', Password::min(8)],
        ]);

        $validatedData['type'] = 'table';

        $user = User::create(['username' => $validatedData['username'], 'password' => bcrypt($validatedData['password'])]);
        unset($validatedData['username'], $validatedData['password']);

        $validatedData['user_id'] = $user->id;

        Student::create($validatedData);

        return to_route('dashboard.input-table.index')->with('success', 'Berhasil menambah siswa baru');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $input_table)
    {
        $grades = Grade::orderBy('name')->get();
        $regions = Region::orderBy('name')->get();

        return view('dashboard.input-table.edit', compact('input_table', 'grades', 'regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $input_table)
    {
        $rules = [
            'name' => ['required', 'string'],
            'nis' => ['required'],
            'grade_id' => ['required', 'exists:grades,id'],
            'region_id' => ['required', 'exists:regions,id'],
            'username' => ['required', 'string', 'alpha_dash', 'min:6', Rule::unique('users', 'username')->ignore($input_table->user->id)],
        ];

        if ($request->password) $rules['password'] = ['required', Password::min(8)];

        $validatedData = $request->validate($rules);

        $input_table->user->update([
            'username' => $validatedData['username'],
            'password' => !$request->password ? $input_table->user->password : bcrypt($validatedData['password'])
        ]);

        unset($validatedData['username'], $validatedData['password']);

        $input_table->update($validatedData);

        return to_route('dashboard.input-table.index')->with('success', 'Berhasil mengubah siswa ' . $input_table->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $input_table)
    {
        $input_table->user->delete();

        return to_route('dashboard.input-table.index')->with('success', 'Berhasil menghapus siswa ' . $input_table->name);
    }

    public function show(Student $input_table){
        if(isset($_GET['month'])){
            $bln = $_GET['month'];
            $m = cal_days_in_month(CAL_GREGORIAN,$bln,date('y'));
        }else{
            $m = date('m');
            $bln = $m;
        }
        $bulan = [
            '1' => 'Januari',
            '2' => 'Febuari',
            '3' => 'Maret',
            '4' => 'April',
            '5' => 'Mei',
            '6' => 'Juni',
            '7' => 'Juli',
            '8' => 'Agustus',
            '9' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];
        $bulan = $bulan[$bln];
        $activities = Activity::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        $student = $input_table;
        return view('dashboard.input-table.show', compact('student', 'activities', 'categories', 'bulan', 'bln', 'm'));
    }

    static function getCheck($activity_id, $student_id, $date, $month)
    {
        $daily_activities = DailyActivity::where('student_id', $student_id)->whereDay('date', $date)->whereMonth('date', $month)->first();
        $arr = explode(',', $daily_activities);
        foreach($arr as $a){
            if($a == $activity_id){
                return 1;
            }
        }
    }

    public function activities (Student $input_table, $student){
        if(isset($_GET['month'])){
            $bln = $_GET['month'];
            $m = cal_days_in_month(CAL_GREGORIAN,$bln,date('y'));
        }else{
            $m = date('m');
            $bln = $m;
        }
        $bulan = [
            '1' => 'Januari',
            '2' => 'Febuari',
            '3' => 'Maret',
            '4' => 'April',
            '5' => 'Mei',
            '6' => 'Juni',
            '7' => 'Juli',
            '8' => 'Agustus',
            '9' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];
        $bulan = $bulan[$bln];
        $activities = Activity::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        $student = $input_table;
        return view('dashboard.input-table.activities', compact('student', 'activities', 'categories', 'bulan', 'bln', 'm'));
    }
}
