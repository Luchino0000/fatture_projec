<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{


    public function welcome2(){
        return view('welcome_2');
    }


    public function index(){
        return view('clients.index');
    }





    public function store(Request $request){

    $clients = Client::create([
        'name' => $request->name,
        'email' => $request->email,
    ]);

      return redirect(route('all_clients'));
    }




    public function all(){

        $clients = Client::all();
        return view('clients.all',compact('clients'));
    }



    public function edit(Client $client){
        return view('clients.edit',compact('client'));
    }

    public function update(Request $request,Client $client){
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $client->id,
        ]);

        $client->update($validated);

        return redirect(route('all_clients'));
    }



    public function destroy(Client $client){
       $client->delete();
       return redirect(route('all_clients'));
    }

}
