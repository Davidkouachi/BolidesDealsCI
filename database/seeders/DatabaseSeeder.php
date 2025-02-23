<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use MongoDB\BSON\ObjectId;

use Carbon\Carbon;

use App\Models\User;
use App\Models\Role;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Création des rôles
        $role_admin = DB::table('roles')->insertGetId([
            'nom' => 'ADMINISTRATEUR',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $role_user = DB::table('roles')->insertGetId([
            'nom' => 'UTILISATEUR',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Création des utilisateurs avec MongoDB
        DB::table('users')->insert([
            'mat' => strtoupper(Str::random(10)) . mt_rand(1000, 9999),
            'name' => 'Admin',
            'prenom' => 'admin',
            'phone' => '0585782723',
            'lock' => 'non',
            'email' => 'admin@gmail.com',
            'email_verified_at' => null,
            'image_nom' => null,
            'image_chemin' => null,
            'adresse' => 'Néant',
            'password' => Hash::make('Admin001'),
            'role_id' => (string)$role_admin,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'mat' => strtoupper(Str::random(10)) . mt_rand(1000, 9999),
            'name' => 'Vender',
            'prenom' => 'vendeur',
            'phone' => '0585782725',
            'lock' => 'non',
            'email' => 'vendeur@gmail.com',
            'email_verified_at' => null,
            'image_nom' => null,
            'image_chemin' => null,
            'adresse' => 'Néant',
            'password' => Hash::make('Vendeur001'),
            'role_id' => (string)$role_user,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $types = ['4x4','berline','break','bus','camion','coupé','mini-bus','moto','pick-up','suv','tricycle','utilitaire','autre'];
        foreach ($types as $value) {
            DB::table('types')->insert([
                'nom' => $value,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $villes = [
            'Abengourou','Abidjan','Aboisso','Adiaké','Adzopé','Agnibilékrou','Akoupé','Arrah','Bangolo','Bassawa','Bettié','Bocanda','Bondoukou','Bonoua','Botro','Bouaké','Bouna','Boundiali','Dabou', 'Daloa','Danané','Daoukro','Dianra','Dimbokro','Divo','Duekoué','Facobly','Ferkessédougou','Gagnoa','Grand-Bassam','Grand-Lahou','Gouiné','Guiglo','Guitry','Gbon','Issia',
                'Jacqueville','Katiola','Kong','Korhogo','Kounahiri','Kouassi-Datékro','Kouibly','Lakota',
                'Lomokankro','Man','Mankono','Marcory','Méagui','Minignan','M’Bahiakro','Nassian',
                'Niakaramandougou','Odienné','Oumé','Ouellé','San-Pédro','Sakassou','Samoé','Sassandra',
                'Séguéla','Sikensi','Sinfra','Sipilou','Soubré','Tabou','Tanda','Tiassalé','Tiapoum',
                'Tiébissou','Tengréla','Toulepleu','Touba','Toumodi','Transua','Vavoua','Yamoussoukro',
                'Zouan-Hounien','Zoukougbeu',
        ];
        foreach ($villes as $ville) {
            DB::table('villes')->insert([
                'nom' => $ville,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
