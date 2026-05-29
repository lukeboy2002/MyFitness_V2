<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@myfitness.test',
            'password' => bcrypt('adminadmin'),
            'is_admin' => true,
        ]);

        $antoine = User::factory()->create([
            'name' => 'Antoine Hendriks',
            'username' => 'Antoine',
            'email' => 'antoine@myfitness.test',
            'avatar' => 'avatars/cuLDALPk5NbXhWVaUezKg9aTzBON9JT5b9F5aFdc.jpg',
            'password' => bcrypt('password'),
            'is_admin' => false,
        ]);

        DB::table('passkeys')->insert([
            'id' => 1,
            'authenticatable_id' => $antoine->id,
            'name' => 'Login',
            //            'credential_id' => '{XJ??wL/???hk??Aw',
            'credential_id' => '{XJ??wL/???hk??Aw',
            'data' => '{"type": "public-key", "aaguid": "fbfc3007-154e-4ecc-8c0b-6e020557d7bd", "counter": 0, "trustPath": [], "transports": ["hybrid", "internal"], "userHandle": "Mg", "backupStatus": true, "uvInitialized": false, "backupEligible": true, "attestationType": "none", "credentialPublicKey": "pQECAyYgASFYIPnBqENYcN8ivxKWxr1xiLUm3XO6Ck9RnG7RIWY6OBijIlggBXlY4sa8kT3A62qlO3VLg0AQGiVn2V6XlPulzA6RrnE", "publicKeyCredentialId": "A3tYBEqrh3dMLxmy9rhoa_vJQXc"}',
            'last_used_at' => '2026-05-23 22:32:53',
            'created_at' => '2026-05-23 22:32:16',
            'updated_at' => '2026-05-23 22:32:53',
        ]);

        User::factory()->create([
            'name' => 'Alice Hendriks',
            'username' => 'Alice',
            'email' => 'alice@myfitness.test',
            'password' => bcrypt('password'),
            'is_admin' => false,
        ]);

        $this->call([
            CarouselSeeder::class,
        ]);
    }
}
