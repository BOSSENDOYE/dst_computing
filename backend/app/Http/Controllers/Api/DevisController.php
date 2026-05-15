<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Devi;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DevisController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'nom_complet'       => 'required|string|max:150',
            'structure'         => 'nullable|string|max:150',
            'telephone'         => 'required|string|max:30',
            'email'             => 'required|email|max:150',
            'localisation'      => 'nullable|string|max:150',
            'type_projet'       => 'required|string',
            'secteur'           => 'required|string',
            'description_besoin'=> 'required|string|min:20',
            'budget_estimatif'  => 'nullable|string',
            'delai_souhaite'    => 'nullable|string',
            'source_contact'    => 'nullable|string|max:200',
            'piece_jointe'      => 'nullable|file|max:5120|mimes:pdf,doc,docx,jpg,jpeg,png',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        // Upload de la pièce jointe
        if ($request->hasFile('piece_jointe')) {
            $data['piece_jointe'] = $request->file('piece_jointe')
                ->store('devis/pieces-jointes', 'local');
        }

        $devis = Devi::create($data);

        // Email de confirmation au prospect
        // Mail::to($devis->email)->send(new DevisConfirmationMail($devis));

        // Email de notification interne
        // Mail::to(config('mail.devis_to'))->send(new DevisNotificationMail($devis));

        return response()->json([
            'success' => true,
            'message' => 'Votre demande de devis a bien été enregistrée. Nous vous recontacterons sous 24h.',
            'id'      => $devis->id,
        ], 201);
    }
}
