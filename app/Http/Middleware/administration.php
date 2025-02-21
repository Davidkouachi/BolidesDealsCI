<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Response;

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

class administration
{

    public function handle(Request $request, Closure $next, $role)
    {

        if (!Auth::check()) {
            return redirect()->route('index_accueil')->with('warning', 'Vous devez être connecté pour accéder à cette page.');
        }

        $user = DB::table('roles')->where('id', Auth::user()->role_id)->first();

        if (!$user) {
            return redirect()->route('index_accueil')->with('error', 'Votre rôle n\'a pas pu être déterminé.');
        }

        if ($user->nom !== $role) {
            return redirect()->route('index_accueil')->with('error', 'Vous n\'avez pas les permissions nécessaires pour accéder à cette page.');
        }


        return $next($request);
    }
}
