<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tenant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $tenant = Tenant::create([
            'name' => 'Consultoria PT'
        ]);

        User::create([
            'tenant_id' => $tenant->id,
            'name' => 'Personal Trainer',
            'email' => 'admin@ptmanager.com',
            'password' => Hash::make('password'),
        ]);
    }
}
