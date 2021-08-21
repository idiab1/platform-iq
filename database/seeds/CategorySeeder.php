<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Computer Science',
            'Front-end development',
            'Back-end development',
            'Full-stack development',
            'Mobile Development',
            'Desktop Development',
            'Other',
        ];
        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
            ]);
        }
    }
}
