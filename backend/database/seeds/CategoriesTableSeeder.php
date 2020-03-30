<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Category;
class CategoriesTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         Category::create([
             'name' => 'Resto Bars',
             'slug' => 'resto-bars',
             'model' => 'App\Place',
         ]);
         Category::create([
             'name' => 'Cheap Eats',
             'slug' => 'cheap-eats',
             'model' => 'App\Place',
         ]);
         Category::create([
             'name' => 'Tourist Attractions',
             'slug' => 'tourist-attractions',
             'model' => 'App\Place',
         ]);
         Category::create([
             'name' => 'Nightclubs',
             'slug' => 'nightclubs',
             'model' => 'App\Place',
         ]);
         Category::create([
             'name' => 'Activities Under 10$',
             'slug' => 'activities-under-10$',
             'model' => 'App\Place',
         ]);
         Category::create([
             'name' => 'Poutines',
             'slug' => 'poutines',
             'model' => 'App\Place',
         ]);
        Category::create([
             'name' => 'Free Stuff',
             'slug' => 'free-stuff',
             'model' => 'App\Place',
         ]);
         Category::create([
             'name' => 'Best Views of Mtl',
             'slug' => 'best-views-of-mtl',
             'model' => 'App\Place',
         ]);
         Category::create([
             'name' => 'Yearly Events',
             'slug' => 'yearly-events',
             'model' => 'App\Place',
         ]);
    }
}
