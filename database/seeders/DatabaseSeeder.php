<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Link;
use App\Models\Theme;
use App\Models\User;
use App\Models\Visit;
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
        $this->call(ThemeSeeder::class);

         \App\Models\User::factory(10)
             ->create()
             ->each(function ($user) {
                 $user->theme_id = Theme::first('id')->id;
                 $user->save();
             });

        $user = User::factory()->create([
            'user_name' => 'elk_dev',
            'email' => 'elk.dev.official@gmail.com',
        ]);

        $user->theme_id = Theme::first('id')->id;
        $user->save();

        Link::factory(5)->create([
            'user_id' => $user->id
        ])->each(fn ($link) => Visit::factory(random_int(10, 101))->create([
            'link_id' => $link->id,
        ]));

    }
}
