<?php

namespace Database\Seeders;

use App\Enums\Theme\Button\ButtonRadiusSize;
use App\Enums\Theme\Button\ButtonType;
use App\Models\Theme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $themes = [
            [
                'name' => 'air leaf',
                'bg_color' => '#43E660',
                'color' => '#fff',
                'button_type' => ButtonType::FILLED->value,
                'button_radius_size' => ButtonRadiusSize::MEDIUM->value,
            ],
            [
                'name' => 'air moon',
                'bg_color' => '#2665D6',
                'color' => '#fff',
                'button_type' => ButtonType::FILLED->value,
                'button_radius_size' => ButtonRadiusSize::MEDIUM->value,
            ],
        ];

        foreach ($themes as $theme){
            Theme::factory()->create($theme);
        }
    }
}
