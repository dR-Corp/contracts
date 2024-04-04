<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paiements = Paiement::all();
        return response()->json($paiements);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'montant' => 'required|integer',
            'datePaiement' => 'required|date',
            'contrat_id' => 'required|exists:contrats,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $paiement = Paiement::create($request->all());

        return response()->json($paiement, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'montant' => 'required|integer',
            'datePaiement' => 'required|date',
            'contrat_id' => 'required|exists:contrats,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $paiement = Paiement::findOrFail($id);
        $paiement->update($request->all());

        return response()->json($paiement, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $paiement = Paiement::findOrFail($id);
        $paiement->delete();
        return response()->json(null, 204);
    }
}
