<?php

namespace App\Modules\Users\Models\Seeders;

// use App\Models\User;

use App\Modules\Users\Models\User;
use App\Modules\Users\Models\UserLevel;
use Faker\Core\Uuid;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $levels = [
      [
        'level' => 'admin',
        'slug' => 'admin',
      ],
      [
        'level' => 'user',
        'slug' => 'user',
      ]
    ];
    foreach ($levels as $level) {
      UserLevel::create($level);
    }
    $levelAdm = UserLevel::where('slug', 'admin')->first();
    User::create([
      'user_level_id' => $levelAdm->id,
      'name' => 'Admin',
      'email' => 'adminemail@admin.com.br',
      'email_verified_at' => now(),
      'password' => Hash::make('123'),
      'remember_token' => Str::random(10),
    ]);
    User::factory(50)->create();

    // User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);
  }
}
