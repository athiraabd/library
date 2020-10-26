<?php

namespace App\Http\Controllers;

use App\Book;
use App\Issue;
use Carbon\Carbon;
use Hamcrest\Core\Is;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issues = Issue::all();
        return view('issues.index', compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::all();
        return view('issues.create', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $duedate = Carbon::today()->addDays(14)->toDateString();

        Issue::create([
            'book_id' => $request->book_id,
            'issue_date' => Carbon::createFromFormat('d/m/Y', $request->issue_date)->toDateString(),
            'due_date' => $duedate,
            'status' => 1
        ]);


        return redirect()->route('issues.index')->with('status', 'Book is issued successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($issueId)
    {
        $issue = Issue::findOrFail($issueId);
        return view('issues.edit', compact('issue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Issue $issue)
    {

        $issue->fill($request->merge([
            'issue_date' => Carbon::createFromFormat('d/m/Y', $request->issue_date)->toDateString(),
            'due_date' => Carbon::createFromFormat('d/m/Y', $request->due_date)->toDateString(),
            'return_date' => Carbon::createFromFormat('d/m/Y', $request->return_date)->toDateString()
        ])->all())->save();

        return redirect()->route('issues.index')->with('status', 'Book issued status is successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Issue $issue)
    {
        $issue->delete();
        return redirect()->route('issues.index')->with('status', 'Book issued is deleted successfully!');
    }

    public function getIssue()
    {
        return Issue::all();
    }
}
