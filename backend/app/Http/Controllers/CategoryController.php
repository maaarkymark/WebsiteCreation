<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request as Request;

class CategoryController extends Controller
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
        $categories = Category::query();
        $results = $categories->get();
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
        $category = Category::find($id);
        return response()->json($category);
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
        $category = Category::create($request->all());

        // Validate
        if($category->isValid()) {
            return response()->json($category);
        } else {
            return response()->json($category->getErrors());
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
        $category = Category::where('id', $id)
            ->update($request->all());
        return response()->json($category);
    }

}
