<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taches = Tache::all();
        return response()->json($taches);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'etat' => 'required|string|max:255',
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date',
            'contrat_id' => 'required|exists:contrats,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $tache = Tache::create($request->all());

        return response()->json($tache, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'etat' => 'required|string|max:255',
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date',
            'contrat_id' => 'required|exists:contrats,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $tache = Tache::findOrFail($id);
        $tache->update($request->all());

        return response()->json($tache, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tache = Tache::findOrFail($id);
        $tache->delete();
        return response()->json(null, 204);
    }
}
