<?php

namespace App\Http\Controllers;

use App\Models\User;
//use Couchbase\View;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;


class adminController extends Controller
{
    public function dashboard(){

        return view('frontend_admin.dashboard');
    }


    public function password(){

        return view('frontend_admin.password');
    }


    public function analytics(){

        return view('frontend_admin.analytics');
    }


    public function orders(){

        return view('frontend_admin.orders');
    }


    public function users(){

        //This week's new users
        $lastUsers7 = User::whereBetween('created_at', [
            Carbon::now()->subDays(7)->startOfDay(),
            Carbon::now()->endOfDay()
        ])->get();

        //Users older thanone week
        $oldUsers = User::where('created_at', '<', Carbon::now()->subDays(7))->get();

        //for last week all users which register each day
        $currentWeekStart = Carbon::now()->startOfWeek();
        $currentWeekEnd = Carbon::now()->endOfWeek();

        $counts = User::select(DB::raw('COUNT(*) as count'), DB::raw('DATE_FORMAT(created_at, "%W") as day'))
            ->whereBetween('created_at', [$currentWeekStart, $currentWeekEnd])
            ->groupBy('day')
            ->get()
            ->toArray();

        $days = [
            'Monday' => 0,
            'Tuesday' => 0,
            'Wednesday' => 0,
            'Thursday' => 0,
            'Friday' => 0,
            'Saturday' => 0,
            'Sunday' => 0
        ];

        foreach($counts as $count) {
            $day = ucfirst(strtolower($count['day']));
            $days[$day] = $count['count'];
        }

        $eachDay = (object)$days;


        return view('frontend_admin.users',[
            'users'=>User::all(),
            'lastUsers7'=>$lastUsers7,
            'oldUsers'=>$oldUsers,
            'eachDay'=>$eachDay,
        ]);
    }


    public function sales(){
        return view('frontend_admin.sales');
    }

}
