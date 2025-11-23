<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $names = ['Beauty','Accessories','School Supplies','Jewelry','Bags','RTW'];
        foreach ($names as $n) {
            Category::create(['CategoryName'=>$n]);
        }
    }
}
