<?php

namespace Database\Seeders;

use App\Enums\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => Role::BUSINESS],
            ['name' => Role::MEDICAL],
            ['name' => Role::NORMAL],
            ['name' => Role::ADMIN],
        ];

        DB::table('roles')->insert($roles);
    }
}
