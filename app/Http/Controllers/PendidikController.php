<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\DailyActivity;
use Illuminate\Support\Facades\Auth;

class PendidikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function welcome(){
    //     return view('dashboard.welcome');
    // }

    public function welcome_teacher(){

        
        return view('dashboard.welcome_teacher');
    }

     
    static function getCheck($activity_id, $date, $month)
    {
        $daily_activities = DailyActivity::where('student_id', Auth::user()->id)->whereMonth('date', $month)->whereDay('date', $date)->get('activity_id');
        $arr = explode(',', $daily_activities);
        foreach($arr as $a){
            if($a == $activity_id){
                return 1;
            }
        }

    }

    public function index()
    {
        if(isset($_GET['month'])){
            $bln = $_GET['month'];
            // $m = cal_days_in_month(CAL_GREGORIAN,$bln,date('y'));
            $myActivities = DailyActivity::where('student_id', Auth::user()->id)->whereMonth('date', $bln)->orderBy('date')->get();
        }else{
            $m = date('m');
            $bln = $m;
            $myActivities = DailyActivity::where('student_id', Auth::user()->id)->whereMonth('date', $m)->orderBy('date')->get();
        }
        $bulan = [
            '01' => 'Januari',
            '02' => 'Febuari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];
        $bulan = $bulan[$bln];
        $activities = Activity::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();

        return view('dashboard.pendidik.index', compact('activities', 'categories', 'bulan', 'bln', 'myActivities'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
