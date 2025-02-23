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

class DeleteController extends Controller
{
    public function delete_marque(Request $request)
    {
        // Récupérer les IDs des marques sélectionnées
        $selectedIds = $request->selected;

        if ($selectedIds) {
            // Récupérer les marques à supprimer
            $marques = DB::table('marques')->whereIn('id', $selectedIds)->get();

            foreach ($marques as $marque) {
                $imagePath = storage_path('app/public/images/' . $marque->image_nom);
                // Supprimer l'image du stockage
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }

                DB::table('marques')->where('id', (string)$marque->id)->delete();
            }

            return response()->json(['success' => true, 'message' => 'Les marques sélectionnées ont été supprimées avec succès.']);
        }

        return response()->json(['selected_introuv' => true, 'message' => 'Aucune marque sélectionnée.']);
    }
}
