<?php

use App\Category;
use App\Tag;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('APP_ENV') == 'production' || env('APP_ENV') == 'staging') {
            $now = Carbon::now()->toDateTimeString();

            // Call out user role & permission seeders
            $this->call(UserRoleSeeder::class);

            // Create only 1 super admin user
            $user = User::create(
                [
                    'name' => 'Super Admin',
                    'email' => 'super-admin@example.com',
                    'password' => Hash::make('password'),
                ]
            );
            $user->save();
            $user->assignRole('super-admin');

            // Create tags & categories
            Tag::insert([
                ['user_id' => $user->id, 'slug' => Str::slug('OOP'), 'name' => 'OOP', 'created_at' => $now, 'updated_at' => $now],
                ['user_id' => $user->id, 'slug' => Str::slug('Python'), 'name' => 'Python', 'created_at' => $now, 'updated_at' => $now],
                ['user_id' => $user->id, 'slug' => Str::slug('Web Design'), 'name' => 'Web Design', 'created_at' => $now, 'updated_at' => $now],
                ['user_id' => $user->id, 'slug' => Str::slug('Laravel/PHP'), 'name' => 'Laravel/PHP', 'created_at' => $now, 'updated_at' => $now],
                ['user_id' => $user->id, 'slug' => Str::slug('Data Structure'), 'name' => 'Data Structure', 'created_at' => $now, 'updated_at' => $now],
                ['user_id' => $user->id, 'slug' => Str::slug('Database Design'), 'name' => 'Database Design', 'created_at' => $now, 'updated_at' => $now],
            ]);

            Category::insert([
                ['user_id' => $user->id, 'slug' => Str::slug('None'), 'name' => 'None', 'created_at' => $now, 'updated_at' => $now],
                ['user_id' => $user->id, 'slug' => Str::slug('Frontend'), 'name' => 'Frontend', 'created_at' => $now, 'updated_at' => $now],
                ['user_id' => $user->id, 'slug' => Str::slug('Backend'), 'name' => 'Backend', 'created_at' => $now, 'updated_at' => $now],
                ['user_id' => $user->id, 'slug' => Str::slug('Database'), 'name' => 'Database', 'created_at' => $now, 'updated_at' => $now],
            ]);
        }
    }
}
