<?php

namespace App\Http\Controllers;

use App\Magazine;
use Illuminate\Http\Request;

class MagazineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $magazines = Magazine::all();
        return view('magazines.index', compact('magazines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('magazines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Magazine::create([
            'type' => $request->type,
            'name' => $request->name,
            'receipt_date' => $request->receipt_date,
            'publish_date' => $request->publish_date,
            'price' => $request->price,
            'pages' => $request->pages,
            'publisher' => $request->publisher
        ]);

        return redirect()->route('magazines.index')->with('status', 'Magazine is successfully updated!');
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
    public function edit(Magazine $magazine)
    {
        return view('magazines.edit', compact('magazine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Magazine $magazine)
    {
        $magazine->update($request->all());
        return redirect()->route('magazines.index')->with('status', 'Magazine is successfully updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Magazine $magazine)
    {
        $magazine->delete();
        return redirect()->route('magazines.index')->with('status', 'Magazine is successfully deleted!');
    }
}
