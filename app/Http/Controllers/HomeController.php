<?php

namespace App\Http\Controllers;

use App\Book;
use App\Magazine;
use App\Newspaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $countBooks = Book::count();
        $countMagazines = Magazine::count();
        $countNewspapers = Newspaper::count();
        return view('dashboard.home', compact('countBooks', 'countMagazines', 'countNewspapers'));
    }

    public function issuedYearly()
    {
        $data = DB::table('issues')
            ->select(DB::raw('MONTH(issues.issue_date) month'), DB::raw('count(issues.id) as total'))
            ->groupBy('month')
            ->get()
            ->map(function ($el) {
                return [
                    'month' => $el->month,
                    'total' => $el->total
                ];
            });

        $array = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        for ($i = 0; $i < 12; $i++) {

            if (isset($data[$i]['month'])) {
                $array[(int)$data[$i]['month'] - 1] += $data[$i]['total'];
            }
        }

        return response()->json($array);
    }

}
