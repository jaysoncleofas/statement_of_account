<?php

namespace App\Http\Controllers;

use Auth;
use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
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
        $data['clients'] = Client::latest()->get();
        return view('client.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
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
            'name'           => 'required|string|unique:clients|max:255',
            'billingAddress' => 'required|string|max:255',
            'contactNumber'  => 'required|string|max:255',
        ]);
        
        $user = Auth::user();

        $user->clients()->create([
            'name' => $request->name,
            'address' => $request->billingAddress,
            'contact' => $request->contactNumber,
        ]);

        session()->flash('status', 'Success');
        session()->flash('type', 'success');
        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {   
        $data['client'] = $client;
        return view('client.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name'           => 'required|string|unique:clients,name,'.$client->id.'id|max:255',
            'billingAddress' => 'required|string|max:255',
            'contactNumber'  => 'required|string|max:255',
        ]);
        
        $client->update([
            'name' => $request->name,
            'address' => $request->billingAddress,
            'contact' => $request->contactNumber,
        ]);

        session()->flash('status', 'Updated');
        session()->flash('type', 'success');
        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        $client->statements()->delete();
        session()->flash('status', 'Deleted!');
        session()->flash('type', 'success');
        return response('success', 200);
    }
}
