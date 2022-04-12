<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index() {

         // implementazione con carbon gg/mm/aa e ora
         $endOfCurrentMonth = Carbon::now()->endOfMonth()->endOfDay();
         $now = Carbon::now();
         $diffInDays = $endOfCurrentMonth->diffInDays($now);
 
         // dd($now->format('d/m/Y h:i:s));

        // recupero info dell'utente loggato
        $user = Auth::user();

        return view('admin.home', compact('user'));
    }
}
