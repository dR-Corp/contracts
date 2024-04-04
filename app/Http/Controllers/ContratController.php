<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contrats = Contrat::all();
        return response()->json($contrats);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date',
            'montant' => 'required|integer',
            'fichier' => 'nullable|file|max:10240', // Adjust max file size as needed
            'prestataire_id' => 'required|exists:prestataires,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $contratData = $request->except('fichier');
        
        if ($request->hasFile('fichier')) {
            $file = $request->file('fichier');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->storeAs('contrat_files', $fileName); // Adjust storage path as needed
            $contratData['fichier'] = $fileName;
        }

        $contrat = Contrat::create($contratData);

        return response()->json($contrat, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date',
            'montant' => 'required|integer',
            'fichier' => 'nullable|file|max:10240', // Adjust max file size as needed
            'prestataire_id' => 'required|exists:prestataires,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $contrat = Contrat::findOrFail($id);

        $contratData = $request->except('fichier');
        
        if ($request->hasFile('fichier')) {
            $file = $request->file('fichier');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->storeAs('contrat_files', $fileName); // Adjust storage path as needed
            $contratData['fichier'] = $fileName;
        }

        $contrat->update($contratData);

        return response()->json($contrat, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contrat = Contrat::findOrFail($id);
        $contrat->delete();
        return response()->json(null, 204);
    }

}
