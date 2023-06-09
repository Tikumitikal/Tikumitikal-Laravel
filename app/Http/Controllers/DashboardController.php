<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Kategori;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalproduct = Product::count();
        $totaluser = User::count();
        $totalkategori = Kategori::count();

        // $visitors = Visitors::select(DB::raw("DATE_FORMAT(tanggal, '%Y-%m-%d') as date"), DB::raw('count(*) as total'))
        //     ->where(
        //         'tanggal',
        //         '>=',
        //         date('Y-m-d', strtotime('-7 days'))
        //     )
        //     ->groupBy('date')
        //     ->orderBy('date')
        //     ->get();

        $totalreservasihariini = Reservasi::select(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as date"), DB::raw('count(*) as total'))
            ->where(
                'created_at',
                '>=',
                date('Y-m-d', strtotime('-7 days'))
            )
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $labeldate = $totalreservasihariini->pluck('date');
        $labeldata = $totalreservasihariini->pluck('total');


        $totalreservasibulanini = Reservasi::whereMonth('created_at', date('m'))->count();

        return view('admin.pages.index', [
            'totalproduct' => $totalproduct,
            'totaluser' => $totaluser,
            'totalreservasibulanini' => $totalreservasibulanini,
            'totalkategori' => $totalkategori,
            'labeldate' => $labeldate,
            'labeldata' => $labeldata,
        ]);
    }
}