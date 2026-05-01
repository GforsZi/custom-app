<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        DB::table('app_settings')->updateOrInsert(['title' => 'Nama Aplikasi', 'type' => 'text', 'key' => 'app_name', 'value' => 'APP-Name', 'created_at' => $now, 'updated_at' => $now]);
        DB::table('app_settings')->updateOrInsert(['title' => 'Alamat', 'type' => 'text', 'key' => 'location', 'value' => 'APP-Location', 'created_at' => $now, 'updated_at' => $now]);
        DB::table('app_settings')->updateOrInsert(['title' => 'WhatsApp', 'type' => 'text', 'key' => 'customer_service', 'value' => '08...', 'created_at' => $now, 'updated_at' => $now]);
        DB::table('app_settings')->updateOrInsert(['title' => 'Email', 'type' => 'text', 'key' => 'email', 'value' => 'App-Email', 'created_at' => $now, 'updated_at' => $now]);
        DB::table('app_settings')->updateOrInsert(['title' => 'Facebook', 'type' => 'text', 'key' => 'link_facebook', 'value' => 'https://facebook.com/', 'created_at' => $now, 'updated_at' => $now]);
        DB::table('app_settings')->updateOrInsert([
            'title' => 'Instagram',
            'type' => 'text',
            'key' => 'link_instagram',
            'value' => 'http://instagram.com/',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('app_settings')->updateOrInsert(['title' => 'Tiktok', 'type' => 'text', 'key' => 'link_tiktok', 'value' => 'https://tiktok.com/', 'created_at' => $now, 'updated_at' => $now]);
        DB::table('app_settings')->updateOrInsert(['title' => 'Teks Footer', 'type' => 'text', 'key' => 'footer_text', 'value' => 'APP-Footer-teks', 'created_at' => $now, 'updated_at' => $now]);
        DB::table('app_settings')->updateOrInsert([
            'title' => 'Sub Teks Footer',
            'type' => 'richeditor',
            'key' => 'footer_sub_text',
            'value' => 'APP-Footer-sub-teks',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('app_settings')->updateOrInsert(['title' => 'Logo Aplikasi', 'type' => 'image', 'key' => 'app_logo', 'value' => '', 'created_at' => $now, 'updated_at' => $now]);
        DB::table('app_settings')->updateOrInsert(['title' => 'Icon Aplikasi', 'type' => 'image', 'key' => 'app_icon', 'value' => '', 'created_at' => $now, 'updated_at' => $now]);
    }
}
