<?php

namespace App\Http\Controllers;

use App\Issue;
use Illuminate\Http\Request;

class ReturnedController extends Controller
{
    public function index ()
    {
        $issues = $this->getIssue()->where('status', 2);
        return view('returns.index', compact('issues'));
    }

    public function getIssue()
    {
        return Issue::all();
    }
}
