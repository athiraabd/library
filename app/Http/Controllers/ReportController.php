<?php

namespace App\Http\Controllers;

use App\Issue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ReportController extends Controller
{
    public function monthlyReport () {

        return view ('report.monthly');
    }

    public function dataMonthly() {

        $data = Issue::with('book')
            ->whereMonth('issue_date', '=', '10')
            ->orderBy('issue_date', 'ASC')
            ->get();

        return DataTables::of($data)
            ->editColumn('issue_date', function ($datum){
                return Carbon::parse($datum->issue_date)->format('d M Y');
            })
            ->editColumn('due_date', function ($datum){
                return Carbon::parse($datum->due_date)->format('d M Y');
            })
            ->make(true);
    }
}
