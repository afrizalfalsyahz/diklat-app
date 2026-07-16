<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Prakom / Superadmin
        User::create([
            'name' => 'Superadmin Prakom',
            'nip' => '198001012005011001',
            'email' => 'prakom@bdi.dev',
            'unit' => 'Prakom',
            'password' => Hash::make('password'),
            'is_active' => true,
        ]);

        // 2. Admin Pengelola BMN
        User::create([
            'name' => 'Admin Pengelola BMN',
            'nip' => '198502022008022002',
            'email' => 'bmn@bdi.dev',
            'unit' => 'Tata Usaha',
            'password' => Hash::make('password'),
            'is_active' => true,
        ]);

        // 3. Admin Arsiparis
        User::create([
            'name' => 'Admin Arsiparis',
            'nip' => '199003032015032003',
            'email' => 'arsip@bdi.dev',
            'unit' => 'Tata Usaha',
            'password' => Hash::make('password'),
            'is_active' => true,
        ]);

        // 4. User Pegawai Biasa
        User::create([
            'name' => 'Pegawai BDI',
            'nip' => '199504042020041004',
            'email' => 'pegawai@bdi.dev',
            'unit' => 'Penyelenggaraan Diklat',
            'password' => Hash::make('password'),
            'is_active' => true,
        ]);

        // Generate 10 random users using Factory
        User::factory(10)->create();
    }
}
