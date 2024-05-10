<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = new Category();
        $category->name = "Judi dan pertaruhan sejenis";
        $category->save();

        $category = new Category();
        $category->name = "Pemerkosaan dan perbuatan cabul";
        $category->save();

        $category = new Category();
        $category->name = "Penyalahgunaan NAPZA";
        $category->save();

        $category = new Category();
        $category->name = "Mabuk minuman keras";
        $category->save();

        $category = new Category();
        $category->name = "Jambret dan pencurian";
        $category->save();

        $category = new Category();
        $category->name = "Korupsi, kolusi dan nepotisme";
        $category->save();

        $category = new Category();
        $category->name = "Pembunuhan";
        $category->save();

        $category = new Category();
        $category->name = "Penculikan";
        $category->save();

        $category = new Category();
        $category->name = "Fitnah";
        $category->save();

        $category = new Category();
        $category->name = "Penganiayaan";
        $category->save();

        $category = new Category();
        $category->name = "Berbuat curang";
        $category->save();
    }
}
