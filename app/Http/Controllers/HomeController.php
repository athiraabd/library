<?php

namespace App\Http\Controllers;

use App\Book;
use App\Issue;
use App\Magazine;
use App\Newspaper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

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

    public function issuedDaily()
    {
        $record = Issue::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(issue_date) as day_name"), \DB::raw("DAY(created_at) as day"))
            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->groupBy('day_name','day')
            ->orderBy('day')
            ->get();


        $data = [];

        foreach($record as $row) {
            $data['label'][] = $row->day_name;
            $data['data'][] = (int) $row->count;
        }

        return response()->json($data);
    }

    public function data (Request $request) {

       /* if(!$request->ajax()){
            return abort('404');
        }*/

        $data = DB::table('issues')
            ->select(DB::raw('MONTH(issues.issue_date) month'), DB::raw('count(issues.id) as total'))
            ->groupBy('month')
            ->orderBy('month', 'ASC')
            ->get();


        return DataTables::of($data)
            ->addColumn('month', function ($datum)
            {
                return Carbon::createFromFormat('m', $datum->month)->format('F');
            })
            ->addColumn('report', function ($datum) {
                /* return '';*/
                return '<a
                       href="' . route('monthly.report', $datum->month) . '"
                       class="text-success mr-2"
                       data-toggle="tooltip" data-placement="top" title="#">
                       <i class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                      ';

            })
            ->rawColumns(['report'])
            ->make(true);

    }



}
