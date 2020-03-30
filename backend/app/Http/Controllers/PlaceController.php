<?php

namespace App\Http\Controllers;
use App\Place;
use Illuminate\Http\Request as Request;

class PlaceController extends Controller
{
    /**
     * Creates a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        // Passes all methods through the auth middleware except those listed
        $this->middleware('auth', ['except' => [
            'index',
            'find'
        ]]);
    }

    /**
     * List places
     *
     * The results can be filtered via request parameters
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request) {

        $places = Place::query();

        // Filter by category slug
        $slug = $request->input('category');
        if($slug) :
            $places->withCategorySlug($slug);
        endif;

        $results = $places->with('categories', 'reviews', 'reviews.author')->get();
        return response()->json($results);
    }

    /**
     * Retrieves a place by id
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function find(Request $request, $id) {
        $place = Place::with('categories', 'reviews', 'reviews.author')->find($id);
        return response()->json($place);
    }

    /**
     * Creates a place based on request values
     *
     * Certain properties are protected from mass assignment via the model's `$fillable` property
     *
     * @param Request $request
     * @return string JSON containing the place if the request succeeds or the errors by field if it fails
     */
    public function create(Request $request) {
        $place = Place::create($request->all());

        // Validate
        if($place->isValid()) {
            return response()->json($place);
        } else {
            return response()->json($place->getErrors());
        }
    }

    /**
     * Updates a place based on request values
     *
     * Certain properties are protected from mass assignment via the model's `$fillable` property
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id) {
        $place = Place::where('id', $id)
            ->update($request->all());
        return response()->json($place);
    }

}
