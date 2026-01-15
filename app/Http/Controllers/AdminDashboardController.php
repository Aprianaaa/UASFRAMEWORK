<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
class AdminDashboardController extends Controller
{
public function index()
{
    $totalIncome = Order::where('status','done')->sum('total');


    $dailyIncome = Order::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('SUM(total) as total')
        )
        ->where('status','done')
        ->groupBy('date')
        ->orderBy('date')
        ->get();

    return view('admin.dashboard', compact('totalIncome','dailyIncome'));
}
}
