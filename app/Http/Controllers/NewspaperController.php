<?php

namespace App\Http\Controllers;

use App\Newspaper;
use Illuminate\Http\Request;

class NewspaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newspapers = Newspaper::all();
        return view('newspapers.index', compact('newspapers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newspapers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Newspaper::create([
            'language' => $request->language,
            'name' => $request->name,
            'receipt_date' => $request->receipt_date,
            'publish_date' => $request->publish_date,
            'price' => $request->price,
            'pages' => $request->pages,
            'type' => $request->type,
            'publisher' => $request->publisher
        ]);

        return redirect()->route('newspapers.index')->with('status', 'Newspaper is successfully updated!');
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
    public function edit(Newspaper $newspaper)
    {
        return view('newspapers.edit', compact('newspaper'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newspaper $newspaper)
    {
        $newspaper->update($request->all());
        return redirect()->route('newspapers.index')->with('status', 'Newspaper is successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newspaper $newspaper)
    {
        $newspaper->delete();
        return redirect()->route('newspapers.index')->with('status', 'Newspaper is successfully deleted!');
    }
}
