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

use App\Models\User;
use App\Models\role;

class AuthController extends Controller
{

    public function trait_login(Request $request)
    {
        // Récupérer les données de la requête
        $login = $request->login; // Email ou téléphone
        $password = $request->password;
        $remember = $request->remember; // Récupération du champ "remember"

        // Déterminer le type de champ utilisé pour l'authentification (email ou téléphone)
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        // Rechercher l'utilisateur par email ou téléphone (MongoDB)
        $user = DB::table('users')->where($fieldType, $login)->first();

        // Vérifier si l'utilisateur existe
        if (!$user) {
            return response()->json(['login_in' => false, 'message' => 'Utilisateur introuvable']);
        }

        // Vérifier si l'utilisateur est bloqué
        if ($user->lock === 'oui') {
            return response()->json(['blocked' => true, 'message' => 'Votre compte est temporairement bloqué.']);
        }

        // Vérifier le mot de passe avec Hash::check()
        if (!Hash::check($password, $user->password)) {
            return response()->json(['error' => true, 'message' => 'Mot de passe incorrect']);
        }

        // 🔥 Correction ici : Utiliser `$user->_id ?? $user->id`
        $userId = (string) ($user->id->{'$oid'} ?? $user->id);

        // Connexion manuelle (avec MongoDB _id)
        Auth::loginUsingId($userId);

        // Si l'utilisateur veut être "remembered"
        if ($remember) {
            request()->session()->put('auth.password_confirmed_at', time());
            Auth::login(Auth::user(), true); // true pour activer remember me
        }

        // Récupérer le rôle de l'utilisateur
        $role = DB::table('roles')->where('_id', (string) $user->role_id)->first();
        if ($role) {
            session(['role' => $role->nom]);
        }

        return response()->json([
            'success' => true,
            'login' => $user->mat,
        ]);
    }

    public function trait_registre(Request $request)
    {

        $rech_email = DB::table('users')->where('email', '=', $request->email)->count();
        if ($rech_email > 0) {
            return response()->json(['email_existe' => true, 'message' => 'l\'email existe déjà']);
        }

        $rech_phone = DB::table('users')->where('phone', '=', $request->phone)->count();
        if ($rech_phone > 0) {
            return response()->json(['contact_existe' => true, 'message' => 'Ce contact existe déjà']);
        }

        Log::info($request->all());

        $filename = null;
        $pdfPathname = null;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $pdfPathname = $request->file('image')->storeAs('public/images', $filename);
            // $imageUrl = str_replace('public', 'storage', $pdfPathname);
        }

        $role = DB::table('roles')->where('nom', '=', 'UTILISATEUR')->first();

        $usersInsert = DB::table('users')->insert([
            'mat' => strtoupper(Str::random(10)) . mt_rand(1000, 9999),
            'name' => $request->nom,
            'prenom' => $request->prenom,
            'phone' => $request->phone,
            'lock' => 'non',
            'email' => $request->email,
            'email_verified_at' => null,
            'image_nom' => $filename,
            'image_chemin' => $pdfPathname,
            'adresse' => $request->adresse ?? 'Néant',
            'password' => Hash::make($request->password),
            'role_id' => $role->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($usersInsert == 0) {
            return response()->json(['error' => true]);
        }

        return response()->json(['success' => true]);
    }

    public function deconnexion(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('index_accueil');
    }

    public function reset_password_email_lien(Request $request)
    {

        $verf = DB::table('users')->where('email', '=', $request->email)->first();

        if (!$verf) {

            return response()->json(['email_existe' => true, 'message' => 'Aucun compte n\'est associé a cet email.']);
        }

        $verf_password = DB::table('password_reset_historiques')->where('email', $request->email)->first();

        if ($verf_password && $verf_password->click == 1) {
            $daysSinceUpdate = Carbon::now()->diffInDays(Carbon::parse($verf_password->updated_at));

            if ($daysSinceUpdate < 60) {
                return response()->json(['date_60' => true, 'message' => 'Vous devez attendre 60 jours avant de modifier votre mot de passe.']);
            }
        }

        $token = Str::random(60);
        $userId = $verf->id instanceof \MongoDB\BSON\ObjectId ? (string) $verf->id : $verf->id;
        $mail = new PHPMailer(true);

        try {
            DB::table('password_reset_historiques')->where('email', $request->email)->delete();

            DB::table('password_reset_historiques')->insert([
                'email' => $request->email,
                'token' => $token,
                'user_id' => $userId,
                'click' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $resetLink = route('index_new_password', ['token' => $token]);

            $mail->isHTML(true);
            $mail->isSMTP();
            $mail->Host = env('MAIL_HOST');
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_FROM_ADDRESS');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->SMTPSecure = env('MAIL_ENCRYPTION');
            $mail->Port = env('MAIL_PORT');
            $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $mail->addAddress($request->email);
            $mail->Subject = 'Lien de reinitialisation du mot de passe !';
            $mail->Body = 'Lien : '.$resetLink.' . Ce lien ne s\'ouvre qu\'une seule fois';

            if (!$mail->send()) {
                throw new Exception('Erreur lors de l\'envoi de l\'email : ' . $mail->ErrorInfo);
            }

            return response()->json(['success' => true, 'message' => 'Lien envoyé']);

        } catch (Exception $e) {
            return response()->json(['error_db' => true, 'message' => $e->getMessage()]);
        }
    }

    public function reset_new_password(Request $request, $token)
    {

        $passwordReset = DB::table('password_reset_historiques')->where('token', $token)->first();

        if (!$passwordReset || $passwordReset->click >= 1) {
            return response()->json(['abort' => true, 'message' => 'Ce lien de réinitialisation est invalide.']);
        }

        // Réinitialisation du mot de passe
        $user = DB::table('users')->where('email', $passwordReset->email)->first();

        if (!$user) {
            return response()->json(['email_existe' => true, 'message' => 'Aucun compte n\'est associé a l\'email de ce lien.']);
        }

        try {

            DB::table('password_reset_historiques')->where('token', $token)->update([
                'click' => 1,
                'token' => null,
                'updated_at' => now(),
            ]);

            DB::table('users')->where('email', $user->email)->update([
                'password' => Hash::make($request->password),
                'updated_at' => now(),
            ]);

            return response()->json(['success' => true]);

        } catch (Exception $e) {
            return response()->json(['error_db' => true, 'message' => $e->getMessage()]);
        }
    }
    
}
