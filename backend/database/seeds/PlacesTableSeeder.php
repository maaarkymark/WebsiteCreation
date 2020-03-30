<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Place;

class PlacesTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run() {
        // Get places from file
        $placesData = Storage::disk('local')->get('places.csv');
        $rows = array_map('str_getcsv', explode("\n", $placesData));

        // Remove last element (empty line/array)
        array_pop($rows);

        // Get property names from first line in CSV
        $header = array_shift($rows);

        // Generate associative array
        foreach($rows as $row) {
            $place = array_combine($header, $row);
            $slug = $place['category'];

            unset($place['category']);

            // Create place & category association
            $savedPlace = App\Place::create($place);
            $category = App\Category::where('slug', $slug)->first();
            $savedPlace->categories()->save($category);
        }
     }
}
