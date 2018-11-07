<?php

namespace App\Http\Controllers;

use App\Particular;
use App\Statement;
use Illuminate\Http\Request;

class ParticularController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $statement_id)
    {
        $request->validate([
            'date'        => 'required|string|max:255',
            'particulars' => 'required|string|max:255',
            'fromDate'    => 'required|string|max:255',
            'toDate'      => 'required|string|max:255',
            'balance'     => 'required|string|max:255',
        ]);
        
        $statement = Statement::findOrFail($statement_id);
        $statement->totalAmount = $statement->totalAmount + $request->balance;
        $statement->minimumAmount = $statement->minimumAmount + $request->balance;
        $statement->save();
        $statement->particulars()->create([
            'date'     => $request->date,
            'description' => $request->particulars,
            'fromDate'     => $request->fromDate,
            'toDate'     => $request->toDate,
            'balance'     => $request->balance,
        ]);

        session()->flash('status', 'Success');
        session()->flash('type', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Particular  $particular
     * @return \Illuminate\Http\Response
     */
    public function show(Particular $particular)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Particular  $particular
     * @return \Illuminate\Http\Response
     */
    public function edit(Particular $particular)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Particular  $particular
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Particular $particular)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Particular  $particular
     * @return \Illuminate\Http\Response
     */
    public function destroy(Particular $particular)
    {   
        $statement = Statement::findOrFail($particular->statement_id);
        $statement->totalAmount = $statement->totalAmount + $particular->balance;
        $statement->minimumAmount = $statement->minimumAmount + $particular->balance;
        $statement->save();

        $particular->delete();

        session()->flash('status', 'Deleted!');
        session()->flash('type', 'success');
        return response('success', 200);
    }
}
