<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Employee;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Employee::factory(5)->create([
            'created_at' => Carbon::today(),
        ]);

        Employee::factory(10)->create([
            'created_at' => Carbon::yesterday(),
        ]);

        //Fake Data for This Week
        Employee::factory(15)->create([
            'created_at' => Carbon::now()->startOfWeek(),
        ])->each(function ($post) {
            $post->created_at = $post->created_at->addMinutes(rand(1, 1440 * 6));
            $post->save();
        });

        //Fake Data for Last Week
        Employee::factory(20)->create([
            'created_at' => Carbon::now()->subWeek()->startOfWeek(),
        ])->each(function ($post) {
            $post->created_at = $post->created_at->addMinutes(rand(1, 1440 * 6));
            $post->save();
        });

        //Fake Data for This Month
        Employee::factory(25)->create([
            'created_at' => Carbon::now()->startOfMonth(),
        ])->each(function ($post) {
            $post->created_at = $post->created_at->addMinutes(rand(1, 1440 * 30));
            $post->save();
        });

        //Fake Data for This Year
        Employee::factory(30)->create([
            'created_at' => Carbon::now()->startOfYear(),
        ])->each(function ($post) {
            $post->created_at = $post->created_at->addMinutes(rand(1, 1440 * 365));
            $post->save();
        });

        //Fake Data for Last Year
        Employee::factory(35)->create([
            'created_at' => Carbon::now()->subYear()->startOfYear(),
        ])->each(function ($post) {
            $post->created_at = $post->created_at->addMinutes(rand(1, 1440 * 365));
            $post->save();
        });
    }
}
