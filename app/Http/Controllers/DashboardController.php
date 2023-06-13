<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\History;
use App\Models\Rents;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function index() {
        if (Auth::check()) {
            $data = History::all();
            $user = User::all();
            $car = Cars::all();
            $cars1 = History::where('cars_id',1)->get();
            $cars2 = History::where('cars_id',2)->get();
            $cars3 = History::where('cars_id',3)->get();
            $cars4 = History::where('cars_id',4)->get();
            $c1 = count($cars1);
            $c2 = count($cars2);
            $c3 = count($cars3);
            $c4 = count($cars4);
            // $data = [$c1,$c2,$c3,$c4];
            return view('panel.dashboard',compact('c1','c2','c3','c4','data','user','car'));
        }
        return view('auth.login');
    }

    function rents(){
        $rents = Rents::all();
        return view('panel.rents',compact('rents'));
    }

    public function history(){
        $data = History::all();
        $user = User::all();
        $car = Cars::all();
        return view('panel.history',compact('data','user','car'));
    }
}
