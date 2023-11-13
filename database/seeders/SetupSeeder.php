<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Hash;
use DB;

class SetupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Ahmad Ali',
            'email' => 'ahmad@gmail.com',
            'password' => Hash::make('12345678'),
            'phone' => '01935056526',
            'username' => 'ahmad',
            'role' => '1',
            'slug' => 'User'.uniqid(20),
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
       
        DB::table('contacts')->insert([
            'contact_phone1' => '01987456321',
            'contact_email1' => 'info@example.com',
            'contact_address1' => 'Mirpur,Dhaka',
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        DB::table('social_media')->insert([
            'socialMedia_facebook' => 'www.facebook.com',
            'socialMedia_linkedin' => 'www.linkedIn.com',
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
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
         DB::table('basics')->insert([
            'basic_companyName' => 'AD Solution Ltd',
            'basic_title' => 'fullfil your dreams',
            'basic_logo' => 'logo',
            'basic_footerLogo' => 'flogo',
            'basic_favicon' => 'fav',
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
    }
}
