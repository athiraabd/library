<?php

namespace App\Http\Controllers;

use App\Issue;
use Illuminate\Http\Request;

class LateReturnedController extends Controller
{
    public function index ()
    {
        $issues = $this->getIssue()->where('status', 3);
        return view('latereturns.index', compact('issues'));
    }

    public function getIssue()
    {
        return Issue::all();
    }
}
