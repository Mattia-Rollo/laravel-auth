<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Javascript', 'PHP', 'Laravel', 'Vue'];
        foreach ($categories as $category) {
            $newcategory = new Category();
            $newcategory->name = $category;
            $newcategory->slug = Str::slug($newcategory->name, '-');
            $newcategory->save();
        }
    }
}