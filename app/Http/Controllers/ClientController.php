<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients= Client::all();
        return view('clients.index',compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'reference' => 'required|string',
            'raison_sociale' => 'required|string',
            'email' => 'nullable|email',
            'tel' => 'nullable|string',
            'adresse' => 'nullable|string',
            'ville' => 'nullable|string',
        ]);

        $client = new Client();
        $client->reference = $request->input('reference');
        $client->raison_sociale = $request->input('raison_sociale');
        $client->email = $request->input('email');
        $client->tel = $request->input('tel');
        $client->adresse = $request->input('adresse');
        $client->ville = $request->input('ville');

        $client->save();

        session()->flash('flash.message',"Votre client " . $client->reference . " a été ajouté avec succès");
        session()->flash('flash.type','success');


        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'reference' => 'required|string',
            'raison_sociale' => 'required|string',
            'email' => 'nullable|email',
            'tel' => 'nullable|string',
            'adresse' => 'nullable|string',
            'ville' => 'nullable|string',
        ]);

        $client = Client::findOrFail($id);

        $client->reference = $request->input('reference');
        $client->raison_sociale = $request->input('raison_sociale');
        $client->email = $request->input('email');
        $client->tel = $request->input('tel');
        $client->adresse = $request->input('adresse');
        $client->ville = $request->input('ville');

        $client->save();

        session()->flash('flash.message',"Votre client " . $client->reference . " a été modifié avec succès");
        session()->flash('flash.type','success');

        return back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        if($client->delete()) {
            session()->flash('flash.message',"Votre client " . $client->reference . " a été supprimé");
            session()->flash('flash.type','success');
        } else {
            session()->flash('flash.message',"Votre client " . $client->reference . " n'a pas été supprimé");
            session()->flash('flash.type','danger');
        }

        return back();
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $clients = Client::where(function ($query) use ($search) {
        $query->where('reference', 'like', "%$search%")
              ->orWhere('raison_sociale', 'like', "%$search%")
              ->orWhere('email', 'like', "%$search%")
              ->orWhere('tel', 'like', "%$search%")
              ->orWhere('adresse', 'like', "%$search%")
              ->orWhere('ville', 'like', "%$search%");
            })->get();

        return view('clients.index', ['clients' => $clients,'search' => $search]);
    }
}
