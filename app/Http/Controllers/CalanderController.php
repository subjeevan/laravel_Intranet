<?php

namespace App\Http\Controllers;

use App\Models\Calander;
use Illuminate\Http\Request;

class CalanderController extends Controller
{
function index(){
    $months = Calander::orderBy('order', 'asc')->get();
    return view('calander',compact('months'));
}

}
