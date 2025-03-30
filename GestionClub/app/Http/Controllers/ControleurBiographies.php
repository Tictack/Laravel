<?php

namespace App\Http\Controllers;

use App\Models\Biographie;
use App\Models\Membre;
use Illuminate\Http\Request;


class ControleurBiographies extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        $membre = Membre::with('biographie')->findOrFail($id);

        if (auth()->user()->id !== $membre->id) {
            return redirect()->back()->with('error', 'Non autorisé');
        }

        return view('edition', compact('membre'));
    }

    public function update(Request $request, $id) {
        $membre = Membre::findOrFail($id);

        if (auth()->user()->id !== $membre->id) {
            return redirect()->back()->with('error', 'Non autorisé');
        }

        Biographie::updateOrCreate(
            ['membre_id' => $membre->id],
            ['texte' => $request->input('biographie')]
        );

        return redirect()->route('membre.show', $id)->with('success', 'Biographie mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
