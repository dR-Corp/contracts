<?php

namespace App\Http\Controllers;

use App\Models\Prestataire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PrestataireController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prestataires = Prestataire::all();
        return response()->json($prestataires);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'matricule' => 'required|string|max:255',
            'entreprise' => 'required|string|max:255',
            'typeEntreprise' => 'required|string|max:255',
            'ifu' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $prestataire = Prestataire::create($request->all());

        return response()->json($prestataire, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'matricule' => 'required|string|max:255',
            'entreprise' => 'required|string|max:255',
            'typeEntreprise' => 'required|string|max:255',
            'ifu' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $prestataire = Prestataire::findOrFail($id);
        $prestataire->update($request->all());

        return response()->json($prestataire, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $prestataire = Prestataire::findOrFail($id);
        $prestataire->delete();

        return response()->json(null, 204);
    }

}
