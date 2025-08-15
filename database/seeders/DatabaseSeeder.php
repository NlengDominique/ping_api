<?php

namespace Database\Seeders;

use App\Models\Check;
use App\Models\Service;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
   $user = User::factory()->create([
            'name' => 'Lucas',
            'email' => 'lucasdev@example.com',
        ]);

        $service = Service::factory()->for($user)->create([
            'name'=> 'Trebble Api',
            'url'=>'https://api.trebble.com'
        ]);

        Check::factory()->for($service)->count(10)->create();
    }
}
