<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionTableSeeder::class,
            RoleTableSeeder::class,
            KhoaDaoTaoSeeder::class,
            KhoaHocSeeder::class,
            LopHocCoSoSeeder::class,
            MonHocSeeder::class,
            UserTableSeeder::class,
            LopHocPhanSeeder::class,
        ]);
        // \App\Models\User::factory(40)->create()->each(function($user) {
        //     $user->assignRole('user');
        // });
        // \App\Models\UserProfile::factory(43)->create();
    }
}
