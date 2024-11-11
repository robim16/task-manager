<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(3000)->create()
        //     ->each(function(\App\Models\User $u){
        //         \App\Models\Task::factory(15)->create(['user_id' => $u->id]);
        //     });

        \App\Models\Task::factory(5000)->create()
            ->each(function(\App\Models\Task $t){
                \App\Models\Activity::factory(5)->create(['task_id' => $t->id]);
            });
    }
}
