<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'role_name' => 'Super Admin',
                'role_slug' => 'super-admin',
            ],
            [
                'role_name' => 'Admin',
                'role_slug' => 'admin',
            ],
            [
                'role_name' => 'Author',
                'role_slug' => 'author',
            ],
            [
                'role_name' => 'Editor',
                'role_slug' => 'editor',
            ],
            [
                'role_name' => 'Subscriber',
                'role_slug' => 'subscriber',
            ],
            
        ]);
        
    }
}
