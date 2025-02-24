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

class ListController extends Controller
{
    public function list_marque_all()
    {
        // $data = DB::table('marques')->get();

        // foreach ($data as $value) {
            
        //     $value->id = (string)$value->id;
        // }

        $data = DB::table('marques')->get()->map(function ($item) {
            $item->id = (string) $item->id;
            return $item;
        });

        return response()->json([
            'data' => $data,
        ]);
    }

    public function list_users_all()
    {
        // Récupérer tous les utilisateurs
        $users = DB::table('users')->get();

        // Récupérer les rôles sous forme de tableau [id => nom]
        $roles = DB::table('roles')->pluck('nom', 'id');

        // Associer les rôles aux utilisateurs
        foreach ($users as &$user) {
            $user->id = (string) $user->id; // Convertir l'ID en string
            $user->role = $roles[$user->role_id] ?? 'Inconnu'; // Associer le rôle
        }

        return response()->json([
            'data' => $users,
        ]);
    }

}
