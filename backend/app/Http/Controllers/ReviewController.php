<?php

namespace App\Http\Controllers;
use App\Review;
use Illuminate\Http\Request as Request;

class ReviewController extends Controller
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
     * List categories
     *
     * The results can be filtered via request parameters
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request) {
        $reviews = Review::query();
        $results = $reviews->get();
        return response()->json($results);
    }

    /**
     * Retrieves a category by id
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function find(Request $request, $id) {
        $review = Review::find($id);
        return response()->json($review);
    }

    /**
     * Creates a category based on request values
     *
     * Certain properties are protected from mass assignment via the model's `$fillable` property
     *
     * @param Request $request
     * @return string JSON containing the category if the request succeeds or the errors by field if it fails
     */
    public function create(Request $request) {
        $review = Review::create($request->all());

        // Validate
        if($review->isValid()) {
            return response()->json($review);
        } else {
            return response()->json($review->getErrors());
        }
    }

    /**
     * Updates a category based on request values
     *
     * Certain properties are protected from mass assignment via the model's `$fillable` property
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id) {
        $review = Review::where('id', $id)
            ->update($request->all());
        return response()->json($review);
    }

}
