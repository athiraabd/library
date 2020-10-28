<?php

namespace App\Http\Controllers;

use App\Issue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ReportController extends Controller
{
    public function monthlyReport (Request $request) {

        if(request()->ajax())
        {
            if(!empty($request->from_date))
            {
                $data = Issue::with('book')
                    ->whereBetween('issue_date', array($request->from_date, $request->to_date))
                    ->get();
            }
            else
            {
                $data = Issue::with('book')
                    ->get();
            }

            return DataTables::of($data)
                ->editColumn('issue_date', function ($datum){
                    return Carbon::parse($datum->issue_date)->format('d M Y');
                })
                ->editColumn('due_date', function ($datum){
                    return Carbon::parse($datum->due_date)->format('d M Y');
                })
                ->editColumn('status', function ($datum){
                    return $datum->statusTitle;
                })
                ->make(true);
        }

        return view ('report.monthly');
    }

}
