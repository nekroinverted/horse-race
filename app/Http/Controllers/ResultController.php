<?php

namespace App\Http\Controllers;

use App\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $approvedResults = Result::where('approved', true)->orderBy('time', 'asc')->get();
        $unapprovedResults = Result::where('approved', false)->get();
        return view('results.index', ['approvedResults' => $approvedResults, 'unapprovedResults' => $unapprovedResults]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //validate the request
        $request->validate([
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'time' => 'required|numeric'
        ]);
        //
        Result::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'time' => $request->time
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        //
        if(Gate::allows('edit-results')){
            $result->approved = true;
            $result->save();
            return redirect('/');
        }
        //
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        //
        if(Gate::allows('edit-results')){
            $result->delete();
            return redirect('/');
        }
        //
        return redirect('/');
    }
}
