<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear existing sliders (optional - comment out if you want to keep existing data)
        // Slider::truncate();

        $sliders = [
            [
                'name' => 'Welcome to Creation Office Fitouts',
                'content' => 'Your Office - Bring Elegance To',
                'image' => '2019-02-1414_44_33imageCreationsWest-side_20.jpg', // Sanitized filename (colons replaced with underscores)
                'order' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Your Office Interiors',
                'content' => 'Best Ideas For - Interior Design & Office Fitouts',
                'image' => 'Seats.jpeg',
                'order' => 2,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($sliders as $slider) {
            Slider::create($slider);
        }

        $this->command->info('Sliders seeded successfully!');
    }
}
