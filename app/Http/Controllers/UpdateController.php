<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Carbon\Carbon;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class UpdateController extends Controller
{
    public function update_marque(Request $request, $id)
    {
        // Vérifier si la marque existe
        $marque = DB::table('marques')->where('id', $id)->first();

        if (!$marque) {
            return response()->json(['marque_introuv' => true, 'message' => 'L\'identifiant de la ligne est introuvable']);
        }

        // Récupération des anciennes valeurs
        $filename_old = $marque->image_nom;
        $pdfPathname_old = $marque->image_chemin;

        $filename_new = $filename_old;
        $pdfPathname_new = $pdfPathname_old;

        // Vérifier si une nouvelle image a été envoyée
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Générer un nouveau nom de fichier
            $filename_new = time() . '_' . $request->file('image')->getClientOriginalName();
            
            // Sauvegarde du nouveau fichier
            $pdfPathname_new = $request->file('image')->storeAs('images', $filename_new, 'public');

            // Supprimer l'ancienne image si elle existe et est différente
            if ($pdfPathname_old && $pdfPathname_old !== $pdfPathname_new) {
                Storage::disk('public')->delete('images/' . $filename_old);
            }
        }

        // Mise à jour de la base de données
        $update = DB::table('marques')->where('id', $id)->update([
            'nom' => $request->nom,
            'image_nom' => $filename_new,
            'image_chemin' => $pdfPathname_new,
            'updated_at' => now(),
        ]);

        // Vérifier si une mise à jour a été effectuée
        if ($update === 0) {
            return response()->json(['error_db' => true, 'message' => 'Aucune modification détectée']);
        }

        return response()->json(['success' => true, 'message' => 'Mise à jour effectuée avec succès']);
    }
}
