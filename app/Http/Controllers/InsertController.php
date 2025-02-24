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

class InsertController extends Controller
{
    public function insert_marque(Request $request)
    {
        $marque = DB::table('marques')->where('nom', $request->nom)->first();

        if ($marque) {
            return response()->json(['marque_trouve' => true, 'message' => 'Cette marque esite déjà']);
        }

        $filename = null;
        $pdfPathname = null;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $pdfPathname = $request->file('image')->storeAs('images', $filename, 'public');
            // $imageUrl = str_replace('public', 'storage', $pdfPathname);
        }

        $Insert = DB::table('marques')->insert([
            'nom' => $request->nom,
            'image_nom' => $filename,
            'image_chemin' => $pdfPathname,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($Insert == 0) {
            return response()->json(['error_db' => true,'message' => 'error lors de l\'insertion dans marques']);
        }

        return response()->json(['success' => true, 'message' => 'Opération éffectuée']);
    }

    public function insert_user_verouille($mat)
    {
        $user = DB::table('users')->where('mat', $mat)->first();

        if (!$user) {
            return response()->json(['user_introuv' => true, 'message' => 'Ce utilisateur est introuvable']);
        }

        $Insert = DB::table('users')->where('mat', $mat)->update([
            'lock' => 'oui',
            'updated_at' => now(),
        ]);

        if ($Insert == 0) {
            return response()->json(['error_db' => true,'message' => 'error lors de l\'insertion dans users']);
        }

        return response()->json(['success' => true, 'message' => 'Opération éffectuée']);
    }

    public function insert_user_deverouille($mat)
    {
        $user = DB::table('users')->where('mat', $mat)->first();

        if (!$user) {
            return response()->json(['user_introuv' => true, 'message' => 'Ce utilisateur est introuvable']);
        }

        $Insert = DB::table('users')->where('mat', $mat)->update([
            'lock' => 'non',
            'updated_at' => now(),
        ]);

        if ($Insert == 0) {
            return response()->json(['error_db' => true,'message' => 'error lors de l\'insertion dans users']);
        }

        return response()->json(['success' => true, 'message' => 'Opération éffectuée']);
    }

    public function insert_notification(Request $request, $mat)
    {

        $Insert = DB::table('notifications')->insert([
            'type' => $request->type,
            'message' => $request->message,
            'user_mat' => $mat,
            'login_mat' => Auth::user()->mat,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($Insert == 0) {
            return response()->json(['error_db' => true,'message' => 'error lors de l\'insertion dans users']);
        }

        return response()->json(['success' => true, 'message' => 'Opération éffectuée']);
    }
}
