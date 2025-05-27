<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\User;
use  App\Models\Tarefa;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(env('SEEDER_USER_QUANTITY', 5))
            ->has(Tarefa::factory()->count(env('SEEDER_TASK_PER_USER_QUANTITY',5)))
            ->create();
    }
}
