<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'id' => 1,
                'title' => 'Office Fitouts',
                'slung' => 'office-fitouts',
                'image' => '',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 2,
                'title' => 'Door Windows',
                'slung' => 'door-windows',
                'image' => '',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 3,
                'title' => 'Home Land',
                'slung' => 'home-land',
                'image' => '',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 4,
                'title' => 'Roof Installation',
                'slung' => 'roof-installation',
                'image' => '',
                'created_at' => null,
                'updated_at' => null,
            ],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->updateOrInsert(
                ['id' => $category['id']],
                $category
            );
        }

        $this->command->info('Categories seeded successfully!');
    }
}
