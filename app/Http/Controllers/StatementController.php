<?php

namespace App\Http\Controllers;

use Auth;
use App\Statement;
use App\Client;
use Illuminate\Http\Request;

class StatementController extends Controller
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
        $data['clients'] = Client::orderBy('name', 'desc')->get();
        return view('statement.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'client'      => 'required|string|max:255',
            'accountType' => 'required|string|max:255',
            'dueDate'     => 'required|string|max:255',
        ]);
        
        $user = Auth::user();
        $statement = $user->statements()->create([
            'client_id'     => $request->client,
            'accountType' => $request->accountType,
            'dueDate'     => $request->dueDate,
        ]);

        session()->flash('status', 'Success');
        session()->flash('type', 'success');
        return redirect()->route('statement.show', $statement->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Statement  $statement
     * @return \Illuminate\Http\Response
     */
    public function show(Statement $statement)
    {
        $data['statement'] = $statement;
        return view('statement.show', $data);
    }

    public function viewOne(Statement $statement)
    {
        $data['statement'] = $statement;
        return view('statement.view_one', $data);
    }

    public function viewTwo(Statement $statement)
    {
        $data['statement'] = $statement;
        return view('statement.view_two', $data);
    }

    public function viewThree(Statement $statement)
    {
        $data['statement'] = $statement;
        return view('statement.view_three', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Statement  $statement
     * @return \Illuminate\Http\Response
     */
    public function edit(Statement $statement)
    {
        $data['statement'] = $statement;
        $data['clients'] = Client::orderBy('name', 'desc')->get();
        return view('statement.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Statement  $statement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statement $statement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Statement  $statement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statement $statement)
    {
        $statement->delete();

        session()->flash('status', 'Deleted!');
        session()->flash('type', 'success');
        return response('success', 200);
    }
}
