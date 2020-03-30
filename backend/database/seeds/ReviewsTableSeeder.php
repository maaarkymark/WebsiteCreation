<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Review;
use App\Place;
class ReviewsTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {

         $places = Place::all();

         $lipsum = new joshtronic\LoremIpsum();

         foreach($places as $place) {
             $reviewCount = mt_rand(1,5);

             for($i = 0; $i < $reviewCount; $i++) {
                Review::create([
                    'message' => $lipsum->sentences(5),
                    'rating' => mt_rand(0, 5) . '/5',
                    'user_id' => mt_rand(1,3),
                    'place_id' => $place->id
                ]);
             }
         }


    }
}