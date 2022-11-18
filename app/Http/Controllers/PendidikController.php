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
        return view('dashboard.pendidik.index', compact('activities', 'categories', 'bulan', 'bln', 'm'));
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
