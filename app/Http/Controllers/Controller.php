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

class Controller
{
    public function index_accueil()
    {
        return view('accueil');
    }

    // ---------------------------------------------------------------

    public function index_login()
    {
        return view('auth.login');
    }

    public function index_registre()
    {
        return view('auth.registre');
    }

    public function index_reset_password()
    {
        return view('auth.reset_password');
    }

    public function index_new_password($token)
    {
        $passwordReset = DB::table('password_reset_historiques')->where('token', $token)->first();

        if (!$passwordReset || $passwordReset->click >= 1) {
            return abort(403, 'Ce lien de réinitialisation est invalide.');
        }

        return view('auth.new_password',['token' => $token]);
    }

    // ---------------------------------------------------------------

    public function index_accueil_bord()
    {
        return view('bord.index');
    }

    public function index_marque_bord()
    {
        return view('bord.marque');
    }


}
